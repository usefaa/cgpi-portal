@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            Daftar Berita
        </h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary fw-bold" style="background-color: #002B5B; border-color: #002B5B;">
            <i class="fas fa-plus me-2"></i>
            Tambah Berita
        </a>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.berita.index') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-lg-10">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               class="form-control" 
                               placeholder="Cari judul berita..." 
                               oninput="submitFilter()">
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary w-100 h-100" style="background-color: #002B5B; border-color: #002B5B;">
                            Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle berita-table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="80" class="ps-4">No</th>
                            <th width="120">Gambar</th>
                            <th>Judul</th>
                            <th width="120">Status</th>
                            <th width="140">Tanggal</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritas as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration + $beritas->firstItem() - 1 }}</td>
                            
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset($item->gambar) }}" class="berita-thumb">
                                @else
                                    <img src="https://via.placeholder.com/90x60?text=No+Image" class="berita-thumb">
                                @endif
                            </td>
                            
                            <td>
                                <div class="judul-berita fw-semibold text-dark" title="{{ $item->judul }}">
                                    {{ $item->judul }}
                                </div>
                            </td>
                            
                            <td>
                                @if($item->status == 'publish')
                                    <span class="badge bg-success">Publish</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            
                            <td>
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Belum ada berita ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3 px-2 mb-3">
        <div class="text-muted small">
            Total: <span class="fw-bold text-dark">{{ $beritas->total() }}</span> Berita
        </div>
        <div>
            {{ $beritas->links() }}
        </div>
    </div>

</div>

<style>
.berita-table {
    table-layout: fixed;
}
.berita-thumb {
    width: 90px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #dee2e6;
}
.judul-berita {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
}
@media (max-width:1400px){
    .judul-berita {
        max-width: 400px;
    }
}
</style>

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