<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $rooms = $query->get();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048', 
    ]);

    $data = $request->only(['title', 'address', 'price', 'description']);
    $images = [];

    if($request->hasFile('images')){
        foreach($request->file('images') as $image){
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $filename); // lưu trực tiếp vào public/images
            $images[] = $filename;
        }
    }

    $data['images'] = $images; // lưu mảng ảnh trong cột images (JSON)
    Room::create($data);

    return redirect()->route('rooms.index')->with('success', 'Đăng tin phòng thành công!');
}


    // Hiển thị form chỉnh sửa
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // Cập nhật phòng
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Cập nhật phòng thành công!');
    }

    // Xóa phòng
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Xóa phòng thành công!');
    }
 
}
