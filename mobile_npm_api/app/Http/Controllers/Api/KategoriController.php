<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 'data' => Kategori::all()]);
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required|string|max:255']);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return response()->json(['success' => true, 'data' => $kategori], 201);
    }

    public function show(Kategori $kategori)
    {
        return response()->json(['success' => true, 'data' => $kategori->load('produk')]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama_kategori' => 'required|string|max:255']);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return response()->json(['success' => true, 'data' => $kategori]);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json(['success' => true, 'message' => 'Kategori dihapus']);
    }
}
