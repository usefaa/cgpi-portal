@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <a href="{{ route('berita.index') }}"
       class="btn btn-outline-secondary mb-4">

        <i class="fas fa-arrow-left me-2"></i>
        Kembali ke Berita

    </a>

    <div class="card border-0 shadow-sm">

        @if($berita->gambar)

            <img src="{{ asset($berita->gambar) }}"
                 class="card-img-top"
                 style="max-height:500px;object-fit:cover;">

        @endif

        <div class="card-body p-4">

            <small class="text-danger fw-semibold">

                {{ $berita->created_at->format('d F Y') }}

            </small>

            <h1 class="fw-bold mt-2 mb-4">

                {{ $berita->judul }}

            </h1>

            <div style="line-height:1.9;font-size:17px;">

                {!! nl2br(e($berita->isi)) !!}

            </div>

        </div>

    </div>

</div>

@endsection