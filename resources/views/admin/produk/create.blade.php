@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="color: #2F5597;">Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
