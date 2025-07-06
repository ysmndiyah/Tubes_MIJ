<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #5564a8 0%, #b5abc0 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #2c3e50, #3498db, #9b59b6, #e74c3c);
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }

        .form-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .form-header h2 {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .form-header p {
            color: #bdc3c7;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .form-body {
            padding: 40px 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #ddd;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #7f8c8d;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #7f8c8d;
            font-size: 1.2rem;
            pointer-events: none;
            transition: color 0.3s ease;
        }

        .form-control:focus + .input-icon {
            color: #3498db;
        }

        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(52, 152, 219, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(149, 165, 166, 0.4);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: inherit;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .btn:hover::before {
            transform: translateX(100%);
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 152, 219, 0.1) 0%, transparent 70%);
            animation: float-around 8s ease-in-out infinite;
        }

        .floating-elements::before {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-elements::after {
            bottom: 10%;
            right: 10%;
            animation-delay: 4s;
        }

        @keyframes float-around {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-30px) scale(1.1); }
        }

        .form-footer {
            background: linear-gradient(135deg, #ecf0f1 0%, #bdc3c7 100%);
            padding: 20px 30px;
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 10px;
                border-radius: 20px;
            }

            .form-header {
                padding: 30px 20px;
            }

            .form-header h2 {
                font-size: 2rem;
            }

            .form-body {
                padding: 30px 20px;
            }

            .btn-container {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading animation */
        .btn-primary:active {
            transform: scale(0.95);
        }

        .form-control::placeholder {
            color: #bdc3c7;
            font-style: italic;
        }

        /* Success animation */
        .form-container.success {
            animation: pulse 0.5s ease-in-out;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="floating-elements"></div>
        
        <div class="form-header">
            <h2>Edit Pesanan</h2>
            <p>Perbarui informasi pesanan Anda</p>
        </div>

        <form action="{{ route('beli.update', $beli->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="form-body">
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" id="nama" name="nama" class="form-control" 
                           value="{{ $beli->nama }}" placeholder="Masukkan nama pelanggan" required>
                    <span class="input-icon">👤</span>
                </div>

                <div class="form-group">
                    <label for="produk">Produk</label>
                    <input type="text" id="produk" name="produk" class="form-control" 
                           value="{{ $beli->produk }}" placeholder="Masukkan nama produk" required>
                    <span class="input-icon">📦</span>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" 
                           value="{{ $beli->jumlah }}" placeholder="Masukkan jumlah" min="1" required>
                    <span class="input-icon">🔢</span>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea id="catatan" name="catatan" class="form-control" 
                              placeholder="Tambahkan catatan khusus (opsional)">{{ $beli->catatan }}</textarea>
                    <span class="input-icon">📝</span>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> Update Pesanan
                    </button>
                    <a href="{{ route('beli.index') }}" class="btn btn-secondary">
                        <span>↩️</span> Kembali
                    </a>
                </div>
            </div>
        </form>

        <div class="form-footer">
            <p>Pastikan semua informasi sudah benar sebelum menyimpan</p>
        </div>
    </div>

    <script>
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            const form = document.querySelector('form');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Form submission animation
            form.addEventListener('submit', function() {
                document.querySelector('.form-container').classList.add('success');
            });
        });
    </script>
</body>
</html>