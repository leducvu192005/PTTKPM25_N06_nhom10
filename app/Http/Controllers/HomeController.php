<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{   

    /**
     * Hiển thị danh sách phòng trọ đã được phê duyệt (Trang chủ).
     */
    public function index(Request $request)
    {
        $query = Room::where('status', 'approved'); // Chỉ lấy phòng đã phê duyệt

        // Xử lý tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Xử lý lọc (Ví dụ: theo giá)
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        $rooms = $query->latest()->paginate(12);

        return view('Home', compact('rooms'));
    }

    /**
     * Hiển thị chi tiết một phòng trọ.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('rooms.show', compact('room'));
    }

}