@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Pendaftaran CGPI
            </h3>

            <p class="text-muted mb-0">
                Monitoring dan verifikasi peserta program CGPI
            </p>

        </div>

        <div>

            <span class="status-badge status-success">

                Total {{ $pendaftarans->total() }} Peserta

            </span>

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
                                Perusahaan
                            </th>

                            <th>
                                Penanggung Jawab
                            </th>

                            <th width="200">
                                Status
                            </th>

                            <th width="160">
                                Tanggal
                            </th>

                            <th width="120">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pendaftarans as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->nama_perusahaan }}

                                </div>

                                <small class="text-muted">

                                    {{ $item->bidang_usaha }}

                                </small>

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->nama_penanggung_jawab }}

                                </div>

                                <small class="text-muted">

                                    {{ $item->jabatan_penanggung_jawab }}

                                </small>

                            </td>

                            <td>

                                @if($item->status == 'Draft')

                                    <span class="status-badge status-secondary">

                                        Draft

                                    </span>

                                @elseif($item->status == 'Menunggu Verifikasi')

                                    <span class="status-badge status-warning">

                                        Menunggu Verifikasi

                                    </span>

                                @elseif($item->status == 'Diterima')

                                    <span class="status-badge status-success">

                                        Diterima

                                    </span>

                                @else

                                    <span class="status-badge status-danger">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $item->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <a href="{{ route('admin.pendaftaran.show',$item->id) }}"
                                   class="btn btn-danger btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                Belum ada data pendaftaran

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4">

        {{ $pendaftarans->links() }}

    </div>

</div>

@endsection