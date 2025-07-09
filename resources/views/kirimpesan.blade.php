<!-- resources/views/kirim_pesan.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/kirimpesan.css') }}">
    <title>Form Pemesanan Produk MIJ</title>
    <script>
        function kirimKeWA(event) {
            event.preventDefault(); // agar tidak reload halaman

            const nama = document.getElementById('nama').value;
            const pesan = document.getElementById('pesan').value;

            const nomor = '6281211437153'; // Ganti dengan nomor WhatsApp tujuan (awali dengan 62)
            const teks = `Pemesanan Produk MIJ:%0ANama: ${nama}%0APesan: ${pesan}`;
            const link = `https://wa.me/${nomor}?text=${teks}`;

            window.open(link, '_blank'); // buka di tab baru
        }
    </script>
</head>
<body>
    <h1>Form Pemesanan Produk MIJ</h1>

    <form onsubmit="kirimKeWA(event)">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan" rows="5" cols="30" required></textarea><br><br>

        <button type="submit">Kirim via WhatsApp</button>
        <a href="{{ route('home') }}">
            <button type="button">Kembali ke Beranda</button>
        </a>
        
    </form>
</body>
</html>
