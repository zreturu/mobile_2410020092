<?php

use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ProdukController;
use Illuminate\Support\Facades\Route;

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('produk', ProdukController::class);
