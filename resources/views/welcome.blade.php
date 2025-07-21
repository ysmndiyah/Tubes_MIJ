<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google-site-verification" content="B6CyfDKP2siV6NTgGK3vj9V8NSFhWijPgF9ekBucSus" />
  <script type="module" src="https://cdn.jsdelivr.net/gh/domyid/tracker@latest/index.js"></script>
  <link rel="icon" type="image/png" href="image/ice-cube.png" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/script.js') }}"></script>
  <title>Marine Ice Jaya</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" /> 

  <!-- Feather Icons -->
  
  <script src="https://unpkg.com/feather-icons"></script>


  <!-- My Style -->
  <link rel="stylesheet" href="/style.css" />
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">
      <img src="image/mij logo.jpg" alt="Logo MIJ" class="logo-img" />
      <span class="brand-name">M<span> i </span>j</span>
    </a>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#team">Tim Kami</a>
      <a href="#products">Produk</a>
      <a href="#contact">Kontak</a>
    </div>
    

    <div class="navbar-extra">
      @guest
    <a href="{{ route('login') }}" class="btn-login">Login</a>
   
@else
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-logout">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endguest
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div id="slider" class="mask-container">
      <main class="content">
        <h1 style="text-align: center;">Solusi Ikan Fresh?<br><span>MijIn Aja!</span></h1>
        <p>CV Mij Hadir Untuk ikan segarmu.</p>
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    <h2>Tentang Kami</h2>
    <div class="row">
      <div class="about-img">
        <img src="image/owner.jpg" alt="Tentang Kami" />
      </div>
      <div class="content">
        <h3>Kami adalah M I J</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, tenetur cupiditate facilis obcaecati.</p>
        <p>Ullam maiores minima quos perspiciatis similique itaque, esse rerum eius repellendus voluptatibus!</p>
      </div>
    </div>
  </section>
  <!-- About Section end -->

  <!-- Team Section start -->
  <section id="team" class="team">
    <h2><span>Tim</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, repellendus numquam quam tempora voluptatum.</p>
    <div class="menu-container">
      <div class="menu-card">
        <img src="image/tentang mij.jpg" alt="Tim Kami" />
        <h3>Nama Tim</h3>
        <p>Deskripsi singkat tim.</p>
      </div>
    </div>
  </section>
  <!-- Team Section end -->

  <!-- Products Section start -->
  <section class="products" id="products">
    <div id="product-notification" style="display: none; margin: 20px auto; padding: 12px 20px; background-color: #e0f7fa; color: #00796b; border-left: 5px solid #00796b; border-radius: 5px; width: fit-content; max-width: 90%; font-weight: 500; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
      <!-- Pesan akan ditampilkan di sini -->
    </div>
    <h2><span>Our Best</span> Seller</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum, ab fuga possimus iste.</p>

    <div class="row product-grid">
      @forelse ($produk as $item)
        <div class="product-card">
          <div class="product-image">
            <img src="{{ asset('uploads/' . $item->gambar) }}" alt="{{ $item->nama }}" />
          </div>
          <div class="product-content">
            <h3>{{ $item->nama }}</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
            <a href="javascript:void(0);" 
               onclick="beliSekarang('{{ $item->nama }}', {{ $item->harga }})" class="btn" style="margin-top: 1rem; display: inline-block;"> Beli Sekarang </a>
          </div>
        </div>
      @empty
        <p style="color: white;">Belum ada produk tersedia.</p>
      @endforelse
    </div>
      </div>
    </div>
  </section>
  <!-- Products Section end -->

 <!-- Contact Section start -->
<section id="contact" class="contact">
  <h2><span>Kontak</span> Kami</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.</p>

  <div class="row" style="
    max-width: 450px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  ">

    <!-- MAP -->
    <div style="max-width: 400px; width: 100%; margin: auto;">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.348474586787!2d113.46191387516781!3d-8.367339784345141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd681007771f72f%3A0x361d0ff7d4965d23!2sPT.%20MARINE%20ICE%20INDO%20JAYA!5e0!3m2!1sid!2sid!4v1746961192936!5m2!1sid!2sid"
        width="100%"
        height="220"
        style="border:0; border-radius: 10px; display: block;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

    <!-- TOMBOL -->
    <<a href="{{ url('/kirim-pesan') }}"  
       class="btn" 
       style="padding: 10px 20px; background-color: #2F5597; color: white; border-radius: 5px; text-decoration: none; margin-top: 20px;">
      Kirim Pesan
    </a>

  </div>
</section>
<!-- Contact Section end -->
<!-- Footer start -->
<footer>
  <div class="socials">
    <a href="https://www.instagram.com/vvvysmn/"><i data-feather="instagram"></i></a>
    <a href="#"><i data-feather="twitter"></i></a>
    <a href="#"><i data-feather="facebook"></i></a>
  </div>

  <div class="links">
    <a href="#home">Home</a>
    <a href="#about">Tentang Kami</a>
    <a href="#team">Tim Kami</a>
    <a href="#contact">Kontak</a>
  </div>

  <div class="credit">
    <p>Created by <a href="">KitaRepo</a>. | &copy; 2025.</p>
  </div>
</footer>
<!-- Footer end -->

<!-- Feather Icons -->
<script>
  feather.replace();
</script>

<!-- Background Image Slider -->
<script>
  const images = [
    'image/es balok1.jpg',
    'image/es balok2.jpg',
    'image/es balok3.jpg'
  ];
  let currentIndex = 0;
  const slider = document.getElementById('slider');

  function changeBackground() {
    slider.style.backgroundImage = `url('${images[currentIndex]}')`;
    currentIndex = (currentIndex + 1) % images.length;
  }

  changeBackground();
  setInterval(changeBackground, 3000);
</script>

<!-- Cart Sidebar -->
<div class="cart-sidebar" id="cart-sidebar">
  <ul id="cart-items"></ul>
</div>

<!-- Modal Beli Sekarang -->
<div id="beliModal" class="modal-beli">
  <div class="modal-beli-content">
    <span class="modal-beli-close">&times;</span>
    <h3>Masukkan Jumlah Pembelian</h3>
    <p id="nama-produk"></p>
    <input type="number" id="jumlahInput" min="1" placeholder="Jumlah" />
    <button onclick="kirimPesan()">Kirim ke WhatsApp</button>
  </div>
</div>



<!-- My Javascript -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/whatsapp.js') }}"></script>
</body>

</html>