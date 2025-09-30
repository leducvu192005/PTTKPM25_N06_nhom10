<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Thêm các trường thông tin cá nhân
            $table->string('phone_number')->nullable()->after('email');
            $table->string('full_name')->nullable()->after('name'); // Nếu bạn muốn lưu tên đầy đủ ngoài tên hiển thị
            $table->string('avatar_path')->nullable(); // Đường dẫn ảnh đại diện
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'full_name', 'avatar_path']);
        });
    }
};