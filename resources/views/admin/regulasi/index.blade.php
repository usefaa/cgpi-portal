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

            <form method="GET"
                action="{{ route('regulasi.index') }}">

                <div class="row g-3">

                    <div class="col-lg-6">

                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Cari regulasi...">

                    </div>

                    <div class="col-lg-4">

                        <select name="kategori"
                                class="form-select">

                            <option value="">Semua Kategori</option>

                            <option value="UU & PP"
                                {{ request('kategori') == 'UU & PP' ? 'selected' : '' }}>
                                UU & PP
                            </option>

                            <option value="OJK"
                                {{ request('kategori') == 'OJK' ? 'selected' : '' }}>
                                OJK
                            </option>

                            <option value="KBUMN"
                                {{ request('kategori') == 'KBUMN' ? 'selected' : '' }}>
                                KBUMN
                            </option>

                        </select>

                    </div>

                    <div class="col-lg-2">

                        <button type="submit"
                                class="btn btn-primary w-100 h-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

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

                                Tidak ada regulasi ditemukan.

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

<script>

let timer;

function submitFilter()
{
    clearTimeout(timer);

    timer = setTimeout(() => {

        document.getElementById('filterForm').submit();

    }, 500);
}

</script>