function beliSekarang(namaProduk, harga) {
    selectedProduk = { nama: namaProduk, harga: harga };
    document.getElementById('nama-produk').innerText = `Produk: ${namaProduk}`;
    document.getElementById('jumlahInput').value = '';
    document.getElementById('beliModal').style.display = 'block';
  }
  
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('beliModal');
    const closeBtn = document.querySelector('.modal-beli-close');
  
    closeBtn.onclick = () => {
      modal.style.display = 'none';
    };
  
    window.onclick = (event) => {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    };
  });
  
  function kirimPesan() {
    const jumlah = parseInt(document.getElementById('jumlahInput').value);
    if (!jumlah || jumlah <= 0) {
      alert('Jumlah tidak valid');
      return;
    }
  
    const total = jumlah * selectedProduk.harga;
    const pesan = `Halo! Saya ingin memesan:%0A%0AProduk: ${selectedProduk.nama}%0AJumlah: ${jumlah}%0ATotal: Rp ${total.toLocaleString('id-ID')}`;
    const noWa = '6282245870175'; // Ganti sesuai kebutuhan
    const link = `https://wa.me/${noWa}?text=${pesan}`;
  
    window.open(link, '_blank');
    document.getElementById('beliModal').style.display = 'none';
  }
  