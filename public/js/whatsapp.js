function beliSekarang(id, nama, harga, stok) {
  if (stok <= 0) {
    alert('Maaf, stok ' + nama + ' sudah habis!');
    return;
  }
  document.getElementById('produkIdField').value = id;
  document.getElementById('nama-produk').innerText = `Produk: ${nama}`;
  document.getElementById('jumlahInput').value = '';
  document.getElementById('jumlahInput').setAttribute('max', stok);
  document.getElementById('beliModal').style.display = 'block';
}

function closeModal() {
  document.getElementById('beliModal').style.display = 'none';
}

window.onclick = function(e) {
  const modal = document.getElementById('beliModal');
  if (e.target === modal) {
    closeModal();
  }
}

function cekJumlahDanSubmit() {
  const jumlah = parseInt(document.getElementById('jumlahInput').value);
  const stok = parseInt(document.getElementById('jumlahInput').getAttribute('max'));

  if (jumlah > stok) {
    alert('Maaf, stok hanya tersedia ' + stok);
    return;
  }

  document.getElementById('formBeli').submit();
}
