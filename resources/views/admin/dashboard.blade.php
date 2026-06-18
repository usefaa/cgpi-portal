@extends('layouts.app')

@section('content')

<div class="container-fluid px-0">

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Dashboard Admin
        </h3>

        <p class="text-muted mb-0">
            Ringkasan aktivitas dan statistik Portal IICG
        </p>

    </div>

</div>

<div class="row g-4 mb-4">

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm dashboard-card">

            <div class="card-body">

                <div class="text-muted small mb-2">
                    Total User
                </div>

                <h2 class="fw-bold mb-0">
                    {{ $totalUser }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm dashboard-card">

            <div class="card-body">

                <div class="text-muted small mb-2">
                    Total Berita
                </div>

                <h2 class="fw-bold mb-0">
                    {{ $totalBerita }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm dashboard-card">

            <div class="card-body">

                <div class="text-muted small mb-2">
                    Total Regulasi
                </div>

                <h2 class="fw-bold mb-0">
                    {{ $totalRegulasi }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm dashboard-card">

            <div class="card-body">

                <div class="text-muted small mb-2">
                    Total Pendaftar
                </div>

                <h2 class="fw-bold mb-0">
                    {{ $totalPendaftaran ?? 0 }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="row g-4">

    <div class="col-lg-7">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">

                <h5 class="fw-semibold mb-0">
                    Berita Terbaru
                </h5>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-modern align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Judul</th>

                                <th width="150">
                                    Status
                                </th>

                                <th width="150">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestBerita as $item)

                            <tr>

                                <td>
                                    {{ Str::limit($item->judul, 60) }}
                                </td>

                                <td>

                                    <span class="status-badge status-success">

                                        {{ ucfirst($item->status) }}

                                    </span>

                                </td>

                                <td>

                                    {{ $item->created_at->format('d M Y') }}

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="3"
                                    class="text-center py-4">

                                    Belum ada berita

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-white border-0 py-3">

                <h5 class="fw-semibold mb-0">
                    Regulasi Terbaru
                </h5>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-modern align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Judul</th>

                                <th>Kategori</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestRegulasi as $item)

                            <tr>

                                <td>

                                    {{ Str::limit($item->judul, 45) }}

                                </td>

                                <td>

                                    {{ $item->kategori }}

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="2"
                                    class="text-center py-4">

                                    Belum ada regulasi

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


</div>

@endsection