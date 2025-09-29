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

    public function show($id)
    {
    $phongTro = PhongTro::with('user')->find($id);

    if (!$phongTro) {
        return response()->json(['message' => 'Không tìm thấy phòng trọ'], 404);
    }

    return response()->json($phongTro);
    }
    // them moi phong tro
     public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'tieu_de'      => 'required|string|max:255',
            'mo_ta'        => 'nullable|string',
            'gia'          => 'required|numeric|min:0',
            'dia_chi'      => 'required|string|max:255',
            'dien_tich'    => 'required|numeric|min:0',
            'so_dien_thoai'=> 'required|string|max:15',
        ]);

        $phongTro = PhongTro::create($validated);

        return response()->json([
            'message' => 'Tạo phòng trọ thành công',
            'data'    => $phongTro
        ], 201);
    }
    // cap nhap phong tro
    public function update(Request $request, $id)
{
    $phongtro = PhongTro::findOrFail($id);

    $request->validate([
        'tieu_de' => 'required|string|max:255',
        'mo_ta' => 'nullable|string',
        'gia' => 'required|numeric',
        'dia_chi' => 'required|string|max:255',
        'dien_tich' => 'required|numeric',
        'so_dien_thoai' => 'required|string|max:15',
    ]);

    $phongtro->update([
        'tieu_de' => $request->tieu_de,
        'mo_ta' => $request->mo_ta,
        'gia' => $request->gia,
        'dia_chi' => $request->dia_chi,
        'dien_tich' => $request->dien_tich,
        'so_dien_thoai' => $request->so_dien_thoai,
    ]);

    return redirect()->route('phongtro.index')->with('success', 'Cập nhật phòng trọ thành công!');
}

    // xoa phong tro
    public function destroy($id)
    {
        $phongtro = PhongTro::findOrFail($id);
        $phongtro->delete();

        return redirect()->route('phongtro.index')->with('success', 'Xóa phòng trọ thành công!');
    }
}
