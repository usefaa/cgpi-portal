@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Daftar Berita
        </h2>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-danger">

            <i class="fas fa-plus me-2"></i>
            Tambah Berita

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle berita-table">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th width="120">Gambar</th>
                            <th>Judul</th>
                            <th width="120">Status</th>
                            <th width="140">Tanggal</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($berita as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                @if($item->gambar)

                                    <img src="{{ asset($item->gambar) }}"
                                         class="berita-thumb">

                                @else

                                    <img src="https://via.placeholder.com/90x60?text=No+Image"
                                         class="berita-thumb">

                                @endif

                            </td>

                            <td>

                                <div class="judul-berita"
                                     title="{{ $item->judul }}">

                                    {{ $item->judul }}

                                </div>

                            </td>

                            <td>

                                @if($item->status == 'publish')

                                    <span class="badge bg-success">
                                        Publish
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Draft
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    <a href="{{ route('admin.berita.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form action="{{ route('admin.berita.destroy',$item->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

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

<style>

.berita-table{
    table-layout: fixed;
}

.berita-thumb{
    width:90px;
    height:60px;
    object-fit:cover;
    border-radius:8px;
}

.judul-berita{
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
    max-width:100%;
}

@media (max-width:1400px){

    .judul-berita{
        max-width:400px;
    }

}

</style>

@endsection