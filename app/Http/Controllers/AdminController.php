<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class AdminController extends Controller
{
    // Trang tổng quan
    public function dashboard()
    {
     // Tổng số người dùng
        $totalUsers = User::count();

        // Tổng số phòng
        $totalRooms = Room::count();

        // Số phòng đã duyệt
        $approvedRooms = Room::where('status', 'approved')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalRooms', 'approvedRooms'));
    }

    // Danh sách tất cả phòng
    public function allRooms()
    {
        $rooms = Room::with('user', 'images')->latest()->paginate(15);
        return view('admin.rooms.index', compact('rooms'));
    }

    // Danh sách phòng chờ duyệt
    public function pendingRooms()
    {
        $rooms = Room::where('status', 'pending')->latest()->paginate(15);
        return view('admin.rooms.pending', compact('rooms'));
    }

    // Phê duyệt phòng
    public function approveRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 'approved';
        $room->save();

        return redirect()->route('admin.rooms.pending')
            ->with('success', 'Phòng trọ đã được phê duyệt thành công.');
    }

    // Từ chối/Xóa phòng
    public function rejectRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.pending')
            ->with('success', 'Phòng trọ đã bị từ chối/xóa thành công.');
    }
    public function destroy($id)
    {
    $room = \App\Models\Room::findOrFail($id);
    $room->delete();

    return redirect()->route('admin.rooms.index')
        ->with('success', 'Đã xóa phòng trọ thành công.');
    }
    
}
