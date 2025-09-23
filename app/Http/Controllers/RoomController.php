<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    // API test
    public function test()
    {
        return response()->json([
            'message' => 'API từ RoomController hoạt động!'
        ]);
    }
    // Lấy danh sách phòng
    public function index(){
        return response()->json(['message' => 'Danh sách phòng']);
    }
    //
    public function show($id) {
        return response()->json(['message' =>"Chi tiết phòng $id"]);
    }
    public function store(Request $request) {
        return response()->json(['message' => 'Thêm phòng mới']);
    }

    public function update(Request $request, $id) {
        return response()->json(['message' => "Cập nhật phòng $id"]);
    }

    public function destroy($id) {
        return response()->json(['message' => "Xóa phòng $id"]);
    }

    public function create() {
        return response()->json(['message' => 'Form tạo phòng (chưa cần dùng trong API)']);
    }

    public function edit($id) {
        return response()->json(['message' => "Form chỉnh sửa phòng $id (chưa cần dùng trong API)"]);
    }
}
