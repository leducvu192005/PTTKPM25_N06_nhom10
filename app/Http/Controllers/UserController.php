<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
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
}
