@extends('layouts.app')

@section('content')
<div class="auth-container">
  <h2 style="color: #2F5597; text-align: center;">Login</h2>
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
      <label for="email" class="form-label">Email</label>
      <input id="email" type="email" name="email" required class="form-input">
    </div>

    <div>
      <label for="password" class="form-label">Password</label>
      <input id="password" type="password" name="password" required class="form-input">
    </div>

    <button type="submit" class="btn-login">Login</button>

    <p style="margin-top: 15px;">
      Belum punya akun? <a href="{{ route('register') }}" class="form-link">Daftar di sini</a>
    </p>
  </form>
</div>
@endsection
