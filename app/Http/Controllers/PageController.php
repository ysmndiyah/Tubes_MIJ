<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;   // <-- tambahkan ini

class PageController extends Controller
{
    public function index()
    {
        $produk = Product::all();               // ambil data produk
        return view('welcome', compact('produk'));  // kirim ke view
    }
}
