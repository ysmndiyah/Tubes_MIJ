<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    public function index() {
        $belis = Beli::all();
        return view('beli.index', compact('belis'));
    }

    public function create() {
        return view('beli.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|integer',
        ]);

        Beli::create($request->all());
        return redirect()->route('beli.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function edit(Beli $beli) {
        return view('beli.edit', compact('beli'));
    }

    public function update(Request $request, Beli $beli) {
        $request->validate([
            'nama' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $beli->update($request->all());
        return redirect()->route('beli.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Beli $beli) {
        $beli->delete();
        return redirect()->route('beli.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
