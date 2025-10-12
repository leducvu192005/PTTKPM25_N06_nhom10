<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; // Giả định Model là Room
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    // Đảm bảo chỉ user đã đăng nhập mới có thể truy cập
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Hiển thị danh sách phòng trọ của user hiện tại (Người đăng).
     */
    public function index()
    {
        $rooms = Auth::user()->rooms()->latest()->paginate(10);
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Hiển thị form tạo phòng trọ mới.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Lưu thông tin phòng trọ mới vào CSDL.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1000',
            'address' => 'required|string|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // tao phong moi
        $room = Auth::user()->rooms()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
            'image_path' => '',
            'status' => 'pending', // Mặc định là 'Chờ duyệt'
        ]);
        // 2. Tải file ảnh
        $firstImagePath = null;
        if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $imageFile) {
            $path = $imageFile->store('room_images', 'public');

            // Lưu vào bảng room_images
            $room->images()->create([
                'image_path' => $path,
            ]);

            // Ảnh đầu tiên sẽ là ảnh đại diện
            if ($index === 0) {
                $firstImagePath = $path;
            }
        }
    }

        
        $room->update(['image_path' => $firstImagePath]);


        return redirect()->route('rooms.index')->with('success', 'Phòng trọ đã được đăng thành công và đang chờ Admin phê duyệt.');
    }
    
    // Các hàm show, edit, update, destroy (để user quản lý phòng của mình)
    // sẽ được bổ sung sau, nếu bạn cần.
}