@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                Berita & Artikel
            </h2>
            <p class="text-muted mb-0">
                Informasi terbaru seputar Good Corporate Governance, kegiatan IICG, dan perkembangan tata kelola perusahaan.
            </p>
        </div>
    </div>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('berita.index') }}" id="filterForm">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control border-start-0"
                           placeholder="Cari berita..."
                           oninput="submitFilter()">
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        
        @forelse($beritas as $item)

        <div class="col-xl-4 col-lg-6">
            <div class="card h-100 overflow-hidden shadow-sm border-0">

                @if($item->gambar && file_exists(public_path($item->gambar)))
                    <img src="{{ asset($item->gambar) }}"
                         class="card-img-top"
                         style="height:220px;object-fit:cover;">
                @else
                    <img src="https://picsum.photos/600/350"
                         class="card-img-top"
                         style="height:220px;object-fit:cover;">
                @endif

                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="status-badge status-danger">
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h5 class="fw-bold mb-3">
                        {{ Str::limit($item->judul,80) }}
                    </h5>

                    <p class="text-muted">
                        {{ Str::limit(strip_tags($item->isi),150) }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('berita.show',$item->slug) }}"
                           class="btn btn-danger w-100">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>

            </div>
        </div>

        @empty

        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="text-muted mb-3">
                        <i class="fas fa-newspaper fa-3x"></i>
                    </div>
                    <h5 class="mb-0 text-muted fw-semibold">
                        Berita tidak ditemukan.
                    </h5>
                </div>
            </div>
        </div>

        @endforelse

    </div>

    <div class="d-flex justify-content-between align-items-center mt-5 mb-3 px-2">
        <div class="text-muted small">
            Total: <span class="fw-bold text-dark">{{ $beritas->total() }}</span> Berita
        </div>
        <div>
            {{ $beritas->links() }}
        </div>
    </div>

</div>

<script>
let timer;
function submitFilter() {
    clearTimeout(timer);
    timer = setTimeout(() => {
        document.getElementById('filterForm').submit();
    }, 600); 
}
</script>

@endsection