<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
<<<<<<< HEAD
    protected $fillable = ['title', 'address', 'price', 'description', 'images'];

    protected $casts = [
    ];

=======
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'address',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

>>>>>>> 221c0342fb3cc140a5327dd0735d302360529c26
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}
