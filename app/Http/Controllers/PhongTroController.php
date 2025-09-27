<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongTro;

class PhongTroController extends Controller
{
    public function index()
    {
        $phongTros = PhongTro::with('user')->get();
        return response()->json($phongTros);
    }
}
