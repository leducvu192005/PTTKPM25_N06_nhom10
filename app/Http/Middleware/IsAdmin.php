<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra người dùng đã đăng nhập VÀ có phải là Admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        
        // Nếu không phải Admin, cấm truy cập
        return redirect('/home');
    }
}