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
        Schema::create('hinh_anh', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phong_tro_id')->constrained('phong_tros')->onDelete('cascade');
            $table->string('duong_dan'); // đường dẫn ảnh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh');
    }
};
