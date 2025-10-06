<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Xử lý logic đăng ký người dùng mới.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:6',
        ]);

        // 2. Tạo User
        $user = User::create([
            'name' => $request->fullname,   // map fullname -> name
            'phone_number' => $request->phone_number,     // nhớ thêm cột phone trong migration users
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        // 3. Tự động đăng nhập
        Auth::login($user);

        // 4. Chuyển hướng về trang chủ
        return redirect('/'); 
    }
}
