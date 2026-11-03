<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Staf;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApotekController extends Controller
{
    public function index()
    {
        return view('apotek', [
            'pelanggans' => Pelanggan::latest()->get(),
            'stafs' => Staf::latest()->get(),
            'obats' => Obat::latest()->get(),
        ]);
    }

    // PELANGGAN
    public function pelanggan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        Pelanggan::create($data);

        return redirect('/apotek')->with('success', 'Pelanggan berhasil disimpan.');
    }

    // STAF
    public function staf(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        Staf::create($data);

        return redirect('/apotek')->with('success', 'Data staf berhasil disimpan.');
    }

    // OBAT
    public function obat(Request $request)
    {
        $data = $request->validate([
            'kode_obat' => 'required|string|max:255|unique:obats,kode_obat',
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        Obat::create($data);

        return redirect('/apotek')->with('success', 'Data obat berhasil disimpan.');
    }

    // HALAMAN EDIT
    public function edit($jenis, $id)
    {
        $model = $this->model($jenis);
        $data = $model::findOrFail($id);

        return view('edit-apotek', compact('jenis', 'data'));
    }

    // UPDATE DATA
    public function update(Request $request, $jenis, $id)
    {
        $model = $this->model($jenis);
        $data = $model::findOrFail($id);

        if ($jenis === 'pelanggan') {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'no_hp' => 'required|string|max:20',
            ]);
        } elseif ($jenis === 'staf') {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
            ]);
        } else {
            $validated = $request->validate([
                'kode_obat' => [
                    'required', 'string', 'max:255',
                    Rule::unique('obats', 'kode_obat')->ignore($id),
                ],
                'nama_obat' => 'required|string|max:255',
                'stok' => 'required|integer|min:0',
                'tanggal_kadaluwarsa' => 'required|date',
            ]);
        }

        $data->update($validated);

        return redirect('/apotek')->with('success', 'Data berhasil diperbarui.');
    }

    // HAPUS DATA
    public function hapus($jenis, $id)
    {
        $model = $this->model($jenis);
        $model::findOrFail($id)->delete();

        return redirect('/apotek')->with('success', 'Data berhasil dihapus.');
    }

    // MEMILIH MODEL
    private function model($jenis)
    {
        return match ($jenis) {
            'pelanggan' => Pelanggan::class,
            'staf' => Staf::class,
            'obat' => Obat::class,
            default => abort(404),
        };
    }
}