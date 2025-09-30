<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class, // Gọi Seeder Admin
        ]);

        // ĐẢM BẢO KHÔNG CÓ DÒNG NÀO GỌI Room::factory() NẾU BẠN CHƯA CÓ FACTORY
        // Ví dụ: // Room::factory(20)->create([...])
    }
}