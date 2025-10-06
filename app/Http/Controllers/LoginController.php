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
    $request->validate([
        'phone_number' => 'required',
        'password' => 'required',
    ]);

    $credentials = [
        'phone_number' => $request->phone_number,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        if (Auth::user()->is_admin) {
            return redirect()->intended('/admin');
        }
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'phone_number' => 'Số điện thoại hoặc mật khẩu không đúng.',
    ])->onlyInput('phone_number');
}

}
