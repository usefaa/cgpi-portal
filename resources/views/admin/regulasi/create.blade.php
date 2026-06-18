@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Tambah Regulasi
        </h2>

        <a href="{{ route('admin.regulasi.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.regulasi.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Judul Regulasi
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="kategori"
                            class="form-select"
                            required>

                        <option value="UU & PP">
                            UU & PP
                        </option>

                        <option value="OJK">
                            OJK
                        </option>

                        <option value="KBUMN">
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
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        File PDF
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control"
                           accept=".pdf"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-danger">

                    Simpan Regulasi

                </button>

            </form>

        </div>

    </div>

</div>

@endsection