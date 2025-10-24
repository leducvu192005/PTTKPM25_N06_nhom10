<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('user')->orderBy('id', 'desc')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function approve($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 'approved';
        $room->save();

        return back()->with('success', 'Phòng đã được duyệt!');
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
    
public function users()
{
    $users = User::orderBy('id', 'desc')->get();
    return view('admin.users.index', compact('users'));
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return back()->with('danger', 'Người dùng đã bị xóa!');
}
}
