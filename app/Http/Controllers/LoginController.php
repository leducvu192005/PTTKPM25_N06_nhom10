<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Hiển thị form đăng nhập.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Xử lý logic đăng nhập.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Xử lý đăng nhập
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // 3. Chuyển hướng theo quyền
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin');
            }
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không hợp lệ.',
        ])->onlyInput('email');
    }
}