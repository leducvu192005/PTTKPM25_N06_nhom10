<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PhongTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // 🧍‍♂️ 1. Thêm người dùng mẫu
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'full_name' => 'Nguyễn Văn Admin',
            'email' => 'dmin@example.com',
            'phone_number' => '0123456789',
            'avatar_path' => 'default_avatar.jpg',
            'password' => Hash::make('123456'), // Mật khẩu mặc định
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🏠 2. Thêm 5 phòng trọ mẫu
        $rooms = [
            [
                'user_id' => $userId,
                'title' => 'Phòng trọ trung tâm quận 1',
                'description' => 'Phòng rộng 20m2, có máy lạnh, toilet riêng.',
                'address' => '123 Nguyễn Huệ, Quận 1, TP.HCM',
                'price' => 3500000,
                'image_path' => 'images/room1.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'title' => 'Phòng trọ giá rẻ Bình Thạnh',
                'description' => 'Gần trường Đại học Hutech, an ninh tốt.',
                'address' => '25 Điện Biên Phủ, Bình Thạnh, TP.HCM',
                'price' => 2800000,
                'image_path' => 'images/room2.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'title' => 'Phòng cao cấp gần trung tâm',
                'description' => 'Có thang máy, chỗ để xe rộng, bảo vệ 24/7.',
                'address' => '56 Pasteur, Quận 3, TP.HCM',
                'price' => 5000000,
                'image_path' => 'images/room3.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'title' => 'Phòng mini có nội thất',
                'description' => 'Trang bị sẵn giường, tủ, máy lạnh, wifi miễn phí.',
                'address' => '89 Lý Thường Kiệt, Tân Bình, TP.HCM',
                'price' => 4000000,
                'image_path' => 'images/room4.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'title' => 'Phòng nhỏ gọn sinh viên',
                'description' => 'Phòng 12m2, phù hợp 1 người ở, giá rẻ.',
                'address' => '45 Cộng Hòa, Tân Bình, TP.HCM',
                'price' => 2200000,
                'image_path' => 'images/room5.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('rooms')->insert($rooms);
    }
}
