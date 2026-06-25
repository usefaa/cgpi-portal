@extends('layouts.app') {{-- Sesuaikan jika nama master layout Anda berbeda --}}

@section('content')
<div class="container py-5">
    <div class="row bg-light rounded shadow-sm overflow-hidden" style="background-color: #fcf8f2 !important;">
        <div class="col-md-5 p-5">
            <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: #3d3d3d;">Informasi</h2>
            
            <div class="mb-4 d-flex align-items-start">
                <div class="me-3 fs-4 text-secondary"><i class="bi bi-geo-alt"></i></div>
                <div>
                    <h6 class="fw-bold mb-1">Alamat</h6>
                    <p class="text-muted mb-0">{{ $setting->alamat ?? 'Alamat belum diatur' }}</p>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start">
                <div class="me-3 fs-4 text-secondary"><i class="bi bi-telephone"></i></div>
                <div>
                    <h6 class="fw-bold mb-1">Telepon</h6>
                    <p class="text-muted mb-2">{{ $setting->telepon ?? '-' }}</p>
                    @if($setting->telepon)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->telepon) }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3">
                            <i class="bi bi-whatsapp me-1"></i> Hubungi via WhatsApp
                        </a>
                    @endif
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start">
                <div class="me-3 fs-4 text-secondary"><i class="bi bi-envelope"></i></div>
                <div>
                    <h6 class="fw-bold mb-1">Email</h6>
                    <p class="text-muted mb-0">{{ $setting->email ?? '-' }}</p>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start">
                <div class="me-3 fs-4 text-secondary"><i class="bi bi-clock"></i></div>
                <div>
                    <h6 class="fw-bold mb-1">Jam Operasional</h6>
                    <p class="text-muted mb-0">
                        @if($setting->jam_buka && $setting->jam_tutup)
                            Senin - Minggu: {{ \Carbon\Carbon::parse($setting->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::parse($setting->jam_tutup)->format('H:i') }}
                        @else
                            Belum diatur
                        @endif
                    </p>
                </div>
            </div>

            @if($setting->instagram_url)
                <div class="mt-5">
                    <h6 class="fw-bold mb-2">Ikuti Kami</h6>
                    <a href="{{ $setting->instagram_url }}" target="_blank" class="text-decoration-none text-muted">Instagram</a>
                </div>
            @endif
        </div>

        <div class="col-md-7 p-0">
            <div class="w-100 h-100" style="min-height: 450px;">
                {!! $setting->google_maps_embed !!}
            </div>
        </div>
    </div>
</div>
@endsection