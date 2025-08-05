<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use Illuminate\Http\Request;
use App\Models\Product;


class BeliController extends Controller
{
    public function store(Request $request)
    {
        $produk = Product::findOrFail($request->produk_id);
        $jumlah = $request->jumlah;
    
        if ($produk->stok < $jumlah) {
            return back()->with('error','Stok tidak cukup');
        }
    
        $produk->stok -= $jumlah;
        $produk->save();
    
        // redirect ke WA
        $pesan = "Halo! Saya ingin memesan {$produk->nama} sebanyak {$jumlah}.";
        return redirect()->away("https://wa.me/6282245870175?text=" . urlencode($pesan));
    }
}    