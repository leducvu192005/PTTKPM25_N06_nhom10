<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['title', 'address', 'price', 'description', 'images'];

    protected $casts = [
    ];

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}
