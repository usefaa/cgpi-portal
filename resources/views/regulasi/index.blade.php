@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Regulasi Corporate Governance
            </h2>

            <p class="text-muted mb-0">

                Kumpulan regulasi, peraturan, dan pedoman terkait tata kelola perusahaan di Indonesia.

            </p>

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-lg-6">

                    <input type="text"
                           class="form-control"
                           placeholder="Cari regulasi...">

                </div>

                <div class="col-lg-2">

                    <select class="form-select">

                        <option>
                            Semua Kategori
                        </option>

                        <option>
                            UU & PP
                        </option>

                        <option>
                            OJK
                        </option>

                        <option>
                            KBUMN
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-modern align-middle mb-0">

                    <thead>

                        <tr>

                            <th width="80">
                                No
                            </th>

                            <th>
                                Judul Regulasi
                            </th>

                            <th width="180">
                                Kategori
                            </th>

                            <th width="120">
                                Tahun
                            </th>

                            <th width="220">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($regulasis as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->judul }}

                                </div>

                            </td>

                            <td>

                                <span class="status-badge status-secondary">

                                    {{ $item->kategori }}

                                </span>

                            </td>

                            <td>

                                {{ $item->tahun }}

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ asset($item->file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-primary">

                                        Lihat PDF

                                    </a>

                                    <a href="{{ asset($item->file) }}"
                                       download
                                       class="btn btn-sm btn-danger">

                                        Download

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                Belum ada regulasi.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection