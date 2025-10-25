<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }


     public function show()
    {
        $user = Auth::user();
        return view('profile.index', compact('user')); // truyền biến $user sang view
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/avatars'), $filename);
            $user->avatar = 'uploads/avatars/' . $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }
    public function changePassword(Request $request)
{
    $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required|min:6|confirmed', // Laravel cần có field newPassword_confirmation
    ]);

    $user = Auth::user();

    // Kiểm tra mật khẩu cũ
    if (!Hash::check($request->oldPassword, $user->password)) {
        return back()->with('error', 'Mật khẩu hiện tại không chính xác.');
    }

    // Cập nhật mật khẩu mới
    $user->password = Hash::make($request->newPassword);
    $user->save();

    return back()->with('success', 'Đổi mật khẩu thành công!');
}
}
