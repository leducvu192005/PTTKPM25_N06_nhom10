<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
<<<<<<< HEAD
    // Đảm bảo chỉ Admin mới truy cập được các hàm này
    public function __construct()
    {
        // Giả định bạn đã tạo Middleware tên là IsAdmin
        $this->middleware('auth');
        $this->middleware('is_admin'); 
=======
    public function allRooms(){
 $rooms = Room::with('user','images')->get();
    return view('admin.rooms.index', compact('rooms'));
>>>>>>> f70668e (Cập nhật code local)
    }
public function index()
{
    $rooms = Room::with('user','images')->get();
    return view('admin.rooms.index', compact('rooms'));
}

    /**
     * Hiển thị trang quản trị (Dashboard)
     */
    public function index()
    {
        $pendingRooms = Room::where('status', 'pending')->count();
        $totalUsers = \App\Models\User::count();
        // ... thêm các thông tin thống kê khác
        
        return view('admin.dashboard', compact('pendingRooms', 'totalUsers'));
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
     * Phê duyệt phòng trọ.
     */
    public function approveRoom($id)
    {
        $room = Room::findOrFail($id);
        
        $room->status = 'approved';
        $room->save();
        
        // Bạn có thể gửi email thông báo cho người đăng ở đây
        
        return redirect()->route('admin.pending.rooms')->with('success', 'Phòng trọ đã được phê duyệt thành công.');
    }
    
    /**
     * Từ chối/Xóa phòng trọ.
     */
    public function rejectRoom($id)
    {
        $room = Room::findOrFail($id);
        
        // Xóa cả ảnh liên quan nếu cần
        // \Storage::disk('public')->delete($room->image_path);

        $room->delete();

        return redirect()->route('admin.pending.rooms')->with('success', 'Phòng trọ đã bị từ chối/xóa thành công.');
    }
}