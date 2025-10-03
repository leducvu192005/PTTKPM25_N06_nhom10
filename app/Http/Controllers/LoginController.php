<?php

namespace App\Http\Controllers;

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
        // 1. Validate dữ liệu (chỉ kiểm tra required, không ép buộc phải là email)
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $loginField = $request->input('login');
        $credentials = ['password' => $request->password];

        // 2. Xác định đăng nhập bằng email hay phone
        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $loginField;
        } else {
            $credentials['phone_number'] = $loginField;
        }

        // 3. Xử lý đăng nhập
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // 4. Chuyển hướng theo quyền
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không hợp lệ.',
        ])->onlyInput('email');
    }
}
