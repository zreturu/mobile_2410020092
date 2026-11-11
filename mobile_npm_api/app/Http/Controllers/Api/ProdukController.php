<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 'data' => Produk::with('kategori')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk'   => 'required|string|max:255',
            'user_id'       => 'nullable|integer',
            'deskripsi'     => 'nullable|string',
            'harga'         => 'required|integer|min:0',
            'kategori_id'   => 'required|exists:kategori,kategori_id',
            'status_produk' => 'nullable|integer',
        ]);

        $produk = Produk::create($data);

        return response()->json(['success' => true, 'data' => $produk], 201);
    }

    public function show(Produk $produk)
    {
        return response()->json(['success' => true, 'data' => $produk->load('kategori')]);
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'nama_produk'   => 'sometimes|string|max:255',
            'user_id'       => 'nullable|integer',
            'deskripsi'     => 'nullable|string',
            'harga'         => 'sometimes|integer|min:0',
            'kategori_id'   => 'sometimes|exists:kategori,kategori_id',
            'status_produk' => 'nullable|integer',
        ]);

        $produk->update($data);

        return response()->json(['success' => true, 'data' => $produk]);
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json(['success' => true, 'message' => 'Produk dihapus']);
    }
}
