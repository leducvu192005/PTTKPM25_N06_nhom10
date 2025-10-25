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
        // 1️⃣ Validate dữ liệu đầu vào
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // ✅ kiểm tra email hợp lệ + duy nhất
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:6',
        ]);

        // 2️⃣ Tạo người dùng mới
        $user = User::create([
            'name' => $request->fullname,  // map fullname -> name
            'email' => $request->email,    // ✅ thêm email
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        // 3️⃣ Tự động đăng nhập sau khi đăng ký
        Auth::login($user);

        // 4️⃣ Chuyển hướng về trang chủ
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }
}
