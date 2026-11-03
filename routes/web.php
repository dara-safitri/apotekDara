<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApotekController;

// Halaman awal
Route::view('/', 'welcome-apotek');

// Dashboard
Route::get('/apotek', [ApotekController::class, 'index']);

// Simpan data
Route::post('/pelanggan', [ApotekController::class, 'pelanggan']);
Route::post('/staf', [ApotekController::class, 'staf']);
Route::post('/obat', [ApotekController::class, 'obat']);

// Edit data
Route::get('/{jenis}/{id}/edit', [ApotekController::class, 'edit'])
    ->where('jenis', 'pelanggan|staf|obat');

// Update data
Route::put('/{jenis}/{id}', [ApotekController::class, 'update'])
    ->where('jenis', 'pelanggan|staf|obat');

// Hapus data
Route::delete('/{jenis}/{id}', [ApotekController::class, 'hapus'])
    ->where('jenis', 'pelanggan|staf|obat');