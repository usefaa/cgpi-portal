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

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('regulasi.index') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-lg-8">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Cari regulasi..."
                               oninput="submitFilter()">
                    </div>
                    <div class="col-lg-4">
                        <select name="kategori"
                                class="form-select"
                                onchange="document.getElementById('filterForm').submit()">
                            <option value="">Semua Kategori</option>
                            <option value="UU & PP" {{ request('kategori') == 'UU & PP' ? 'selected' : '' }}>UU & PP</option>
                            <option value="OJK" {{ request('kategori') == 'OJK' ? 'selected' : '' }}>OJK</option>
                            <option value="KBUMN" {{ request('kategori') == 'KBUMN' ? 'selected' : '' }}>KBUMN</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-modern align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="80" class="ps-4">No</th>
                            <th>Judul Regulasi</th>
                            <th width="180">Kategori</th>
                            <th width="120">Tahun</th>
                            <th width="220" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($regulasis as $item)
                        <tr>
                            <td class="ps-4">
                                {{ $loop->iteration + $regulasis->firstItem() - 1 }}
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">
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
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ asset($item->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Lihat PDF
                                    </a>
                                    <a href="{{ asset($item->file) }}" download class="btn btn-sm btn-danger">
                                        Download
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                Tidak ada regulasi ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3 px-2">
        <div class="text-muted small">
            Total: <span class="fw-bold text-dark">{{ $regulasis->total() }}</span> Data
        </div>
        <div>
            {{ $regulasis->links() }}
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