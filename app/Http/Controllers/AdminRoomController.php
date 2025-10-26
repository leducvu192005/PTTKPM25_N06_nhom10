<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{

    public function users(Request $request)
    {
        $keyword = $request->input('keyword');
        $users = User::when($keyword, function ($query, $keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.users.index', compact('users'));
    }
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $rooms = Room::with('user')
            ->when($keyword, function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.rooms.index', compact('rooms'));
    }
   public function approve($id)
{
    // Lấy phòng kèm thông tin người đăng
    $room = Room::with('user')->findOrFail($id);

    // Cập nhật trạng thái và lưu thông tin chủ phòng
    $room->update([
        'status' => 'approved',
        'owner_name' => $room->user ? $room->user->name : 'Đang cập nhật',
        'owner_phone' => $room->user ? $room->user->phone_number : 'Đang cập nhật',
    ]);

    return back()->with('success', 'Phòng đã được duyệt và cập nhật thông tin chủ phòng!');
}


    public function reject($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 'rejected';
        $room->save();

        return back()->with('warning', 'Phòng đã bị từ chối!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return back()->with('danger', 'Phòng đã bị xóa!');
    }

    public function show($id)
    {
        $room = Room::with('user')->findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }
    


public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return back()->with('danger', 'Người dùng đã bị xóa!');
}
}
