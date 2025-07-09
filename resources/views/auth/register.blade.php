@extends('layouts.app')

@section('content')
<div class="auth-container">
  <h2 style="color: #2F5597; text-align: center;">Register</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
      <label for="name" class="form-label">Nama</label>
      <input id="name" type="text" name="name" required class="form-input">
    </div>

    <div>
      <label for="email" class="form-label">Email</label>
      <input id="email" type="email" name="email" required class="form-input">
    </div>

    <div>
      <label for="password" class="form-label">Password</label>
      <input id="password" type="password" name="password" required class="form-input">
    </div>

    <div>
      <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required class="form-input">
    </div>

    <button type="submit" class="btn-register">Register</button>

    <p style="margin-top: 15px;">
      Sudah punya akun? <a href="{{ route('login') }}" class="form-link">Login di sini</a>
    </p>
  </form>
</div>
@endsection