<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Liên kết với người đăng
            $table->string('title'); // Tiêu đề phòng trọ
            $table->text('description'); // Mô tả chi tiết
            $table->string('address'); // Địa chỉ
            $table->unsignedBigInteger('price'); // Giá (có thể dùng float nếu có số thập phân)
            $table->string('image_path'); // Đường dẫn ảnh đại diện
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Trạng thái phê duyệt
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};