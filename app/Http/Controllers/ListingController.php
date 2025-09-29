<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->paginate(9);

        return view('home', compact('listings'));
    }

    public function home()
{
    $listings = Listing::latest()->paginate(9);
    return view('home', compact('listings'));
}

    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        return view('rooms.show', compact('listing'));
    }
    public function create()
{
    // Trả về view form tạo listing mới
    return view('rooms.create'); // Tạo file resources/views/listings/create.blade.php
}
}
