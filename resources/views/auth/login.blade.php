@extends('layouts.guest')

@section('content')

<div class="auth-wrapper">

    <div class="auth-card">

        <div class="auth-header">

            <img src="{{ asset('images/IICG logo.jpeg') }}"
                 class="auth-logo"
                 alt="IICG">

            <h1 class="auth-title">
                Masuk ke Portal IICG
            </h1>

            <p class="auth-subtitle">
                Indonesian Institute for Corporate Governance
            </p>

        </div>

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="auth-group">

                <label>Email</label>

                <div class="auth-input-group">

                    <i class="fa-regular fa-envelope"></i>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email Anda"
                           required>

                </div>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="auth-group">

                <label>Password</label>

                <div class="auth-input-group">

                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Masukkan password Anda"
                           required>

                    <i class="fa-regular fa-eye toggle-password"
                       onclick="togglePassword()"></i>

                </div>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <button type="submit"
                    class="auth-btn">

                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Login ke Portal

            </button>

        </form>

        <div class="auth-divider">
            <span>atau</span>
        </div>

        <div class="auth-footer">

            Belum punya akun?

            <a href="{{ route('register') }}">
                Registrasi
            </a>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let input = document.getElementById('password');

    input.type =
        input.type === 'password'
        ? 'text'
        : 'password';
}

</script>

@endsection