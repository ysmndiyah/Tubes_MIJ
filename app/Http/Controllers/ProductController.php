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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['nama', 'deskripsi', 'stok', 'harga']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $namaFile);
            $data['gambar'] = $namaFile;
        }
    
        Product::create($data);
    
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
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:204'
    ]);

    $produk = Product::findOrFail($id);
    $data = $request->only(['nama', 'deskripsi', 'stok', 'harga']);

    if ($request->hasFile('gambar')) {
        // hapus gambar lama jika ada
        if ($produk->gambar && file_exists(public_path('uploads/' . $produk->gambar))) {
            unlink(public_path('uploads/' . $produk->gambar));
        }

        $gambar = $request->file('gambar');
        $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('uploads'), $namaFile);
        $data['gambar'] = $namaFile;
    }


    $produk->update($data);
    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
}


public function destroy($id)
{
    $produk = Product::findOrFail($id);

    // Hapus gambar dari folder uploads
    if ($produk->gambar && file_exists(public_path('uploads/' . $produk->gambar))) {
        unlink(public_path('uploads/' . $produk->gambar));
    }

    $produk->delete();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
}


}
