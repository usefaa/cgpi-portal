@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Pengaturan Profil</h2>
        <p class="text-muted mb-0">Kelola informasi akun dan tingkatkan keamanan kata sandi Anda.</p>
    </div>

    <div class="row g-4">
        
        <div class="col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-dark">Informasi Profil</h5>
                    <p class="text-muted small mb-4">Perbarui nama lengkap dan alamat email akun Anda.</p>

                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
                            <i class="fas fa-check-circle me-2"></i> Profil berhasil diperbarui.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary fw-bold px-4" style="background-color: #002B5B; border-color: #002B5B;">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-dark">Perbarui Kata Sandi</h5>
                    <p class="text-muted small mb-4">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
                            <i class="fas fa-check-circle me-2"></i> Kata sandi berhasil diperbarui.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kata Sandi Saat Ini</label>
                            <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" required autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kata Sandi Baru</label>
                            <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" required autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary fw-bold px-4" style="background-color: #002B5B; border-color: #002B5B;">
                            Perbarui Kata Sandi
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection