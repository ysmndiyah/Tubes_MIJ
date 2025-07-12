<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $produk = Product::all();
    return view('admin.produk.index', compact('produk'));
}


    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);
    
        Product::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    

    public function edit($id)
{
    $produk = Product::findOrFail($id);
    return view('admin.produk.edit', compact('produk'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'nullable',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);

    $produk = Product::findOrFail($id);

    $produk->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'stok' => $request->stok,
        'harga' => $request->harga,
    ]);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
}


public function destroy($id)
{
    $produk = Product::findOrFail($id);
    $produk->delete();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
}

}
