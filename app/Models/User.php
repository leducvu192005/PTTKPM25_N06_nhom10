<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable (Các trường có thể được gán giá trị hàng loạt).
     * Đã thêm full_name, phone_number, is_admin.
     */
    protected $fillable = [
        'name',
        'full_name', // Trường mới
        'email',
        'phone_number', // Trường mới
        'password',
        'is_admin', // Trường mới
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // Đảm bảo is_admin luôn là boolean
    ];

    // Quan hệ: Một User có thể đăng nhiều phòng trọ
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class, 'room_id');
}

}