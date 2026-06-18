@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Detail Pendaftaran
            </h3>

            <p class="text-muted mb-0">
                Informasi peserta dan dokumen pendukung
            </p>

        </div>

        <a href="{{ route('admin.pendaftaran.index') }}"
           class="btn btn-light border">

            Kembali

        </a>

    </div>

    <div class="row g-4">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        Informasi Perusahaan
                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">
                                Nama Perusahaan
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_perusahaan }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">
                                Bidang Usaha
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->bidang_usaha }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">
                                Penanggung Jawab
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_penanggung_jawab }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">
                                Jabatan
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->jabatan_penanggung_jawab }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted">
                                Kontak
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->nama_kontak }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted">
                                Email
                            </small>

                            <div class="fw-semibold">

                                {{ $pendaftaran->email_kontak }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card mt-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        Dokumen Peserta
                    </h5>

                    <table class="table table-modern align-middle">

                        <thead>

                            <tr>

                                <th>Dokumen</th>

                                <th width="180">
                                    Status
                                </th>

                                <th width="150">
                                    Aksi
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

                                <td>

                                    @if($pendaftaran->file_ttd)

                                        <a href="{{ asset('storage/'.$pendaftaran->file_ttd) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-danger">

                                            Lihat

                                        </a>

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

                                <td>

                                    @if($pendaftaran->bukti_pembayaran)

                                        <a href="{{ asset('storage/'.$pendaftaran->bukti_pembayaran) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-danger">

                                            Lihat

                                        </a>

                                    @endif

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        Status Verifikasi
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

                    <div class="d-grid gap-2">

                        <form action="{{ route('admin.pendaftaran.terima',$pendaftaran->id) }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn btn-success w-100">

                                Terima Pendaftaran

                            </button>

                        </form>

                        <form action="{{ route('admin.pendaftaran.tolak',$pendaftaran->id) }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn btn-danger w-100">

                                Tolak Pendaftaran

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection