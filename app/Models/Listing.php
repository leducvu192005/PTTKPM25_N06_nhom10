<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // nếu muốn bảo vệ thuộc tính nào đó
    protected $fillable = ['title', 'address', 'price'];
}
