<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index(){
        return response()->json(['message' => 'Danh sách phòng']);
    }
    public function store(Request $request) {
        return response()->json(['message' => 'Thêm phòng mới']);
    }
    public function destroy($id) {
        return response()->json(['message' => "Xóa phòng $id"]);
    }
}
