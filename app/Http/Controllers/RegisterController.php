<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Tạo User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Mặc định tất cả người đăng ký đều là User thường
        ]);

        // 3. Tự động đăng nhập
        Auth::login($user);

        // 4. Chuyển hướng về trang chủ
        return redirect('/'); 
    }
}