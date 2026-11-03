<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ApotekApiController extends Controller
{
    public function index()
    {
        return response()->json(Obat::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        $obat = Obat::create($data);

        return response()->json([
            'pesan' => 'Obat berhasil ditambahkan',
            'data' => $obat
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Obat::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $data = $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        $obat->update($data);

        return response()->json([
            'pesan' => 'Obat berhasil diperbarui',
            'data' => $obat
        ]);
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return response()->json([
            'pesan' => 'Obat berhasil dihapus'
        ]);
    }
}