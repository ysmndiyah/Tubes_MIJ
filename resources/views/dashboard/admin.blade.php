<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat datang Admin, {{ Auth::user()->name }}</h1>
    <p>Ini adalah halaman dashboard khusus admin.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
