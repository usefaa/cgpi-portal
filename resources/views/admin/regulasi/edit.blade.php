@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Edit Regulasi
        </h2>

        <a href="{{ route('admin.regulasi.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.regulasi.update', $regulasi->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul Regulasi
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ $regulasi->judul }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="kategori"
                            class="form-select"
                            required>

                        <option value="UU & PP"
                            {{ $regulasi->kategori == 'UU & PP' ? 'selected' : '' }}>
                            UU & PP
                        </option>

                        <option value="OJK"
                            {{ $regulasi->kategori == 'OJK' ? 'selected' : '' }}>
                            OJK
                        </option>

                        <option value="KBUMN"
                            {{ $regulasi->kategori == 'KBUMN' ? 'selected' : '' }}>
                            KBUMN
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tahun
                    </label>

                    <input type="number"
                           name="tahun"
                           class="form-control"
                           value="{{ $regulasi->tahun }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        File PDF Saat Ini
                    </label>

                    <div>

                        <a href="{{ asset($regulasi->file) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm">

                            Lihat PDF

                        </a>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Ganti File PDF (Opsional)
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control"
                           accept=".pdf">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti file PDF.
                    </small>

                </div>

                <button type="submit"
                        class="btn btn-warning">

                    Update Regulasi

                </button>

            </form>

        </div>

    </div>

</div>

@endsection