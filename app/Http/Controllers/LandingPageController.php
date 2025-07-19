<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        $produk = Product::all();
        return view('welcome', compact('produk'));
    }
}
