<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            padding: 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .add-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(231, 76, 60, 0.4);
        }

        .add-btn::before {
            content: '+';
            font-size: 1.5rem;
            font-weight: bold;
        }

        .success-message {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            padding: 15px 30px;
            margin: 20px 30px;
            border-radius: 10px;
            font-weight: 500;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table-container {
            padding: 30px;
            overflow-x: auto;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .order-table th {
            background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            color: white;
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .order-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #ecf0f1;
            transition: background-color 0.3s ease;
        }

        .order-table tr:hover {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .order-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .order-table tr:nth-child(odd) {
            background-color: white;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .edit-btn {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .delete-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .delete-form {
            display: inline;
        }

        .quantity-badge {
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
        }

        .notes {
            color: #7f8c8d;
            font-style: italic;
            max-width: 200px;
            word-wrap: break-word;
        }

        .product-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .customer-name {
            font-weight: 500;
            color: #34495e;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .header h2 {
                font-size: 2rem;
            }

            .table-container {
                padding: 15px;
            }

            .order-table {
                font-size: 0.9rem;
            }

            .order-table th,
            .order-table td {
                padding: 12px 8px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Daftar Pesanan</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            <a href="{{ route('home') }}" class="add-btn" style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);">
                🏠 Kembali ke Beranda
            </a>
            <a href="{{ route('beli.create') }}" class="add-btn">Tambah Pesanan</a>
        </div>
    </div>
    

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            @if($belis->count() > 0)
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belis as $beli)
                            <tr>
                                <td class="customer-name">{{ $beli->nama }}</td>
                                <td class="product-name">{{ $beli->produk }}</td>
                                <td>
                                    <span class="quantity-badge">{{ $beli->jumlah }}</span>
                                </td>
                                <td class="notes">{{ $beli->catatan ?: 'Tidak ada catatan' }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('beli.edit', $beli->id) }}" class="edit-btn">Edit</a>
                                        <form action="{{ route('beli.destroy', $beli->id) }}" method="POST" class="delete-form">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <h3>Belum ada pesanan</h3>
                    <p>Klik "Tambah Pesanan" untuk membuat pesanan baru</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>