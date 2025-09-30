<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'price',
        'image_path',
        'status', // pending, approved, rejected
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}