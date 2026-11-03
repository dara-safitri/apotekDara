<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApotekApiController;

Route::get('/obat', [ApotekApiController::class, 'index']);
Route::post('/obat', [ApotekApiController::class, 'store']);
Route::get('/obat/{id}', [ApotekApiController::class, 'show']);
Route::put('/obat/{id}', [ApotekApiController::class, 'update']);
Route::delete('/obat/{id}', [ApotekApiController::class, 'destroy']);