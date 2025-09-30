<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kiểm tra để tránh tạo trùng lặp
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin Chính',
                'full_name' => 'Quản trị viên Hệ thống',
                'email' => 'admin@example.com',
                'phone_number' => '0901234567',
                'password' => Hash::make('password'), // Mật khẩu là 'password'
                'is_admin' => true, // Đặt là TRUE để đây là tài khoản ADMIN
            ]);
        }
    }
}