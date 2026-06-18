@extends('layouts.guest')

@section('content')

<div class="auth-wrapper">

    <div class="auth-card">

        <div class="auth-header">

            <img src="{{ asset('images/IICG logo.jpeg') }}"
                 class="auth-logo"
                 alt="IICG">

            <h1 class="auth-title">
                Registrasi Portal IICG
            </h1>

            <p class="auth-subtitle">
                Buat akun untuk mengikuti program CGPI
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="auth-group">

                <label>Nama Lengkap</label>

                <div class="auth-input-group">

                    <i class="fas fa-user"></i>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama lengkap"
                           required>

                </div>

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="auth-group">

                <label>Email</label>

                <div class="auth-input-group">

                    <i class="fas fa-envelope"></i>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           required>

                </div>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="auth-group">

                <label>Password</label>

                <div class="auth-input-group">

                    <i class="fas fa-lock"></i>

                    <input type="password"
                           name="password"
                           placeholder="Masukkan password"
                           required>

                </div>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="auth-group">

                <label>Konfirmasi Password</label>

                <div class="auth-input-group">

                    <i class="fas fa-lock"></i>

                    <input type="password"
                           name="password_confirmation"
                           placeholder="Konfirmasi password"
                           required>

                </div>

            </div>

            <button type="submit" class="auth-btn">

                <i class="fas fa-user-plus me-2"></i>
                Registrasi

            </button>

        </form>

        <div class="auth-divider">
            <span>atau</span>
        </div>

        <div class="auth-footer">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Login
            </a>

        </div>

    </div>

</div>

@endsection