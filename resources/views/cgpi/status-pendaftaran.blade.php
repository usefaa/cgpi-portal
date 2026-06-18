@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Status Pendaftaran CGPI
    </h3>

    <p class="text-muted mb-0">
        Pantau status pendaftaran dan kelengkapan dokumen perusahaan Anda.
    </p>

</div>

@if(session('success'))

    <div class="alert alert-success border-0 shadow-sm">

        {{ session('success') }}

    </div>

@endif

@if(!$pendaftaran)

    <div class="card border-0 shadow-sm">

        <div class="card-body text-center py-5">

            <h4 class="fw-bold mb-3">
                Belum Ada Pendaftaran
            </h4>

            <p class="text-muted mb-4">

                Anda belum melakukan pendaftaran Program CGPI.

            </p>

            <a href="{{ route('cgpi.pendaftaran') }}"
               class="btn btn-danger">

                Daftar Sekarang

            </a>

        </div>

    </div>

@else

    <div class="row g-4 mb-4">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-semibold mb-4">

                        Data Perusahaan

                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <small class="text-muted d-block">
                                Nama Perusahaan
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_perusahaan }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted d-block">
                                Bidang Usaha
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->bidang_usaha }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted d-block">
                                Penanggung Jawab
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_penanggung_jawab }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted d-block">
                                Kontak
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_kontak }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-semibold mb-4">

                        Status Pendaftaran

                    </h5>

                    @if($pendaftaran->status == 'Draft')

                        <span class="status-badge status-secondary">

                            Draft

                        </span>

                    @elseif($pendaftaran->status == 'Menunggu Verifikasi')

                        <span class="status-badge status-warning">

                            Menunggu Verifikasi

                        </span>

                    @elseif($pendaftaran->status == 'Diterima')

                        <span class="status-badge status-success">

                            Diterima

                        </span>

                    @else

                        <span class="status-badge status-danger">

                            Ditolak

                        </span>

                    @endif

                    <hr>

                    <small class="text-muted d-block mb-2">
                        Batas Upload Dokumen
                    </small>

                    <div class="fw-semibold text-danger">

                        {{ \Carbon\Carbon::parse($pendaftaran->batas_upload)->format('d F Y H:i') }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h5 class="fw-semibold mb-1">

                        Formulir Konfirmasi Kepesertaan

                    </h5>

                    <small class="text-muted">

                        Download formulir untuk ditandatangani dan distempel perusahaan.

                    </small>

                </div>

                <a href="{{ route('pendaftaran.download-pdf', $pendaftaran->id) }}"
                   class="btn btn-danger">

                    Download PDF

                </a>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h5 class="fw-semibold mb-4">

                Upload Dokumen

            </h5>

            <form
                action="{{ route('pendaftaran.upload-dokumen', $pendaftaran->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-body">

                                <h6 class="fw-semibold mb-3">

                                    Formulir Bertanda Tangan

                                </h6>

                                @if($pendaftaran->file_ttd)

                                    <div class="alert alert-success mb-0">

                                        Dokumen sudah diupload

                                    </div>

                                @else

                                    <input
                                        type="file"
                                        name="file_ttd"
                                        class="form-control"
                                        accept=".pdf">

                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-body">

                                <h6 class="fw-semibold mb-3">

                                    Bukti Pembayaran

                                </h6>

                                @if($pendaftaran->bukti_pembayaran)

                                    <div class="alert alert-success mb-0">

                                        Dokumen sudah diupload

                                    </div>

                                @else

                                    <input
                                        type="file"
                                        name="bukti_pembayaran"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf">

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

                @if(!$pendaftaran->file_ttd || !$pendaftaran->bukti_pembayaran)

                    <button
                        type="submit"
                        class="btn btn-danger mt-4">

                        Upload Dokumen

                    </button>

                @endif

            </form>

            <div class="table-responsive mt-5">

                <table class="table table-modern align-middle mb-0">

                    <thead>

                        <tr>

                            <th>Dokumen</th>

                            <th width="200">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Formulir Bertanda Tangan
                            </td>

                            <td>

                                @if($pendaftaran->file_ttd)

                                    <span class="status-badge status-success">

                                        Sudah Upload

                                    </span>

                                @else

                                    <span class="status-badge status-danger">

                                        Belum Upload

                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <td>
                                Bukti Pembayaran
                            </td>

                            <td>

                                @if($pendaftaran->bukti_pembayaran)

                                    <span class="status-badge status-success">

                                        Sudah Upload

                                    </span>

                                @else

                                    <span class="status-badge status-danger">

                                        Belum Upload

                                    </span>

                                @endif

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endif

</div>

@endsection