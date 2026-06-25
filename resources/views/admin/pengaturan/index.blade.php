@extends('layouts.app') {{-- Sesuaikan dengan nama master layout dashboard admin Anda --}}

@section('content')
<div class="container-fluid p-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-danger">Pengaturan Kontak Institusi</h4>
        <a href="{{ route('kontak.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-globe me-1"></i> Lihat Situs Utama
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-left: 5px solid #28a745;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.pengaturan.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">
                            <i class="fas fa-info-circle me-2 text-danger"></i>Informasi Umum
                        </h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Nama Institusi *</label>
                            <input type="text" name="nama_institusi" class="form-control rounded-3" value="{{ $setting->nama_institusi }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Alamat Kantor</label>
                            <textarea name="alamat" class="form-control rounded-3" rows="4">{{ $setting->alamat }}</textarea>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Telepon / No. Kantor</label>
                                <input type="text" name="telepon" class="form-control rounded-3" value="{{ $setting->telepon }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Email Resmi</label>
                                <input type="email" name="email" class="form-control rounded-3" value="{{ $setting->email }}">
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Jam Buka Operasional</label>
                                <input type="time" name="jam_buka" class="form-control rounded-3" value="{{ $setting->jam_buka ? \Carbon\Carbon::parse($setting->jam_buka)->format('H:i') : '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Jam Tutup Operasional</label>
                                <input type="time" name="jam_tutup" class="form-control rounded-3" value="{{ $setting->jam_tutup ? \Carbon\Carbon::parse($setting->jam_tutup)->format('H:i') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">
                            <i class="fas fa-map-marked-alt me-2 text-danger"></i>Media Sosial & Google Maps
                        </h5>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Instagram URL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-3"><i class="fab fa-instagram text-danger"></i></span>
                                <input type="url" name="instagram_url" class="form-control border-start-0 rounded-end-3" value="{{ $setting->instagram_url }}" placeholder="https://instagram.com/username">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Google Maps Embed HTML (Tag Iframe)</label>
                            <textarea name="google_maps_embed" class="form-control rounded-3 font-monospace text-muted" rows="6" style="font-size: 13px;" placeholder="Paste kode <iframe> dari Google Maps di sini...">{{ $setting->google_maps_embed }}</textarea>
                            <div class="form-text text-muted mt-2" style="font-size: 12px;">
                                <i class="fas fa-question-circle me-1"></i> Cara mengambil kode: Buka Google Maps → Cari Lokasi → Klik Bagikan (Share) → Pilih "Sematkan peta" (Embed a map) → Klik "Salin HTML".
                            </div>
                        </div>

                        <div class="text-end mt-4 pt-3">
                            <button type="submit" class="btn text-white px-4 py-2 rounded-3 fw-bold shadow-sm" style="background: linear-gradient(135deg, #ED1C24, #C1121F);">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection