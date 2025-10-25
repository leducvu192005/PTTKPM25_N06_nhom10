<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->string('type')->nullable()->after('status'); // hoặc đặt default nếu muốn
    });
}

public function down(): void
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn('type');
    });
}

};
