@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            Tambah Regulasi
        </h2>
        <a href="{{ route('admin.regulasi.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm border-0 border-start border-5 border-danger mb-4">
                    <div class="fw-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i> Gagal Menyimpan!</div>
                    <ul class="mb-0 text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.regulasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Regulasi</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="UU & PP" {{ old('kategori') == 'UU & PP' ? 'selected' : '' }}>UU & PP</option>
                        <option value="OJK" {{ old('kategori') == 'OJK' ? 'selected' : '' }}>OJK</option>
                        <option value="KBUMN" {{ old('kategori') == 'KBUMN' ? 'selected' : '' }}>KBUMN</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Upload File Regulasi (PDF)</label>
                    
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf" required>
                    
                    <div class="form-text text-muted mt-2">
                        <i class="fas fa-info-circle text-primary"></i> <strong>Catatan Penting:</strong> 
                        Maksimal ukuran file adalah <strong>10 MB</strong> agar website tidak lambat. <br>
                        Jika ukuran PDF Anda lebih dari itu (misal dari hasil scan), mohon kecilkan ukurannya terlebih dahulu menggunakan situs gratis seperti <a href="https://www.ilovepdf.com/compress_pdf" target="_blank" class="text-decoration-none fw-bold">iLovePDF</a>.
                    </div>

                    @error('file')
                        <div class="invalid-feedback fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary fw-bold" style="background-color: #002B5B; border-color: #002B5B;">
                    <i class="fas fa-save me-1"></i> Simpan Regulasi
                </button>

            </form>

        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.querySelector('input[name="file"]');
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const maxSize = 10 * 1024 * 1024; // Batas 10 MB
        
        if (file && file.size > maxSize) {
            // 1. Munculkan pop-up error langsung ke layar pengguna
            alert('❌ GAGAL: Ukuran PDF Anda terlalu besar!\n\nMaksimal ukuran yang diizinkan hanya 10 MB. Silakan kompres file Anda terlebih dahulu.');
            
            // 2. Kosongkan kembali input filenya agar tidak bisa di-submit
            this.value = ''; 
        }
    });
});
</script>

@endsection