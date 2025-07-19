@extends('layouts.app')

@section('content')
<style>
    .modern-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .product-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(31, 41, 55, 0.1);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 48px rgba(31, 41, 55, 0.15);
    }
    
    .card-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #8296b6 100%);
        color: white;
        padding: 1.5rem;
        border: none;
    }
    
    .page-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-add {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        border: none;
        color: white;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(5, 150, 105, 0.4);
        color: white;
    }
    
    .btn-add::before {
        content: '+';
        font-size: 1.2rem;
        font-weight: bold;
    }
    
    .alert-success {
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        border: 1px solid #86efac;
        color: #166534;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.1);
    }
    
    .modern-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        border: none;
    }
    
    .modern-table thead {
        background: linear-gradient(135deg, #374151 0%, #4b5563 100%);
    }
    
    .modern-table thead th {
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.5px;
        padding: 1.25rem 1rem;
        border: none;
        position: relative;
    }
    
    .modern-table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
    }
    
    .modern-table tbody tr {
        border: none;
        transition: all 0.3s ease;
    }
    
    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        transform: scale(1.01);
    }
    
    .modern-table tbody td {
        padding: 1.25rem 1rem;
        border: none;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }
    
    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.3s ease;
        margin-right: 8px;
    }
    
    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    
    .price-tag {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-block;
    }
    
    .stock-badge {
        background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);
        color: white;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6b7280;
        font-style: italic;
    }
    
    .empty-state::before {
        content: '📦';
        font-size: 3rem;
        display: block;
        margin-bottom: 1rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    
    .product-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 4px;
    }
    
    .product-description {
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.4;
    }
    
    @media (max-width: 768px) {
        .modern-container {
            padding: 1rem;
        }
        
        .product-card {
            margin: 0 -0.5rem;
        }
        
        .card-header {
            padding: 1rem;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .modern-table {
            font-size: 0.875rem;
        }
        
        .modern-table thead th,
        .modern-table tbody td {
            padding: 0.75rem 0.5rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }

        .product-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

    }
</style>

<div class="modern-container">
    <div class="container">
        <div class="product-card">
            <div class="card-header">
                <h2 class="page-title">Daftar Produk</h2>
            </div>
            
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('produk.create') }}" class="btn-add">
                        Tambah Produk
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert-success">
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table modern-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produk as $item)
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            @if($item->gambar)
                                                <img src="{{ asset('uploads/' . $item->gambar) }}" alt="{{ $item->nama }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 1px solid #ccc;">
                                            @endif
                                            <div>
                                                <div class="product-name">{{ $item->nama }}</div>
                                                <div class="product-description">{{ $item->deskripsi }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="stock-badge">{{ $item->stok }} unit</span>
                                    </td>
                                    <td>
                                        <span class="price-tag">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('produk.edit', $item->id) }}" class="btn-edit">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete">🗑️ Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        Belum ada produk yang tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection