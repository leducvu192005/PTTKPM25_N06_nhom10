<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class AdminController extends Controller
{

    
    /**
     * Hiển thị dashboard quản trị
     */
    public function dashboard()
    {
        $pendingRooms = Room::where('status', 'pending')->count();
        $totalUsers = User::count();
        // ... thêm các thông tin thống kê khác

        return view('admin.dashboard', compact('pendingRooms', 'totalUsers'));
    }

    /**
     * Hiển thị danh sách tất cả phòng
     */
    public function allRooms()
    {
        $rooms = Room::with('user', 'images')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Hiển thị danh sách phòng trọ đang chờ phê duyệt
     */
    public function pendingRooms()
    {
        $rooms = Room::where('status', 'pending')->latest()->paginate(15);
        return view('admin.pending_rooms', compact('rooms'));
    }

    /**
     * Phê duyệt phòng trọ
     */
    public function approveRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 'approved';
        $room->save();

        return redirect()->route('admin.pending.rooms')
            ->with('success', 'Phòng trọ đã được phê duyệt thành công.');
    }

    /**
     * Từ chối/Xóa phòng trọ
     */
    public function rejectRoom($id)
    {
        $room = Room::findOrFail($id);

        // Xóa cả ảnh liên quan nếu cần
        // \Storage::disk('public')->delete($room->image_path);

        $room->delete();

        return redirect()->route('admin.pending.rooms')
            ->with('success', 'Phòng trọ đã bị từ chối/xóa thành công.');
    }
}
