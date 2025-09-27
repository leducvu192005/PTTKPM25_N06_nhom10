<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    /** @use HasFactory<\Database\Factories\PhongTroFactory> */
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'tieu_de', 'mo_ta', 'gia', 'dia_chi', 'dien_tich', 'so_dien_thoai' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
