<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIJ | @yield('title')</title>

    <link rel="icon" href="{{ asset('image/ice-cube.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-logo">
            <img src="{{ asset('image/mij logo.jpg') }}" alt="Logo MIJ" class="logo-img" />
            <span class="brand-name">M<span> i </span>j</span>
        </a>
        <div class="navbar-nav">
            <a href="/">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#team">Tim Kami</a>
            <a href="#products">Produk</a>
            <a href="#contact">Kontak</a>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container" style="margin-top: 80px;">
        @yield('content')
    </div>

    <!-- Feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>feather.replace()</script>
</body>
</html>

@section('title', 'Login')

@section('content')
    <!-- Form login kamu di sini -->
@endsection

