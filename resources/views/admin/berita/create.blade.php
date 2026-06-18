@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Tambah Berita
        </h2>

        <a href="{{ route('admin.berita.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              rows="10"
                              class="form-control"
                              required></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="publish">
                            Publish
                        </option>

                        <option value="draft">
                            Draft
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-danger">

                    Simpan Berita

                </button>

            </form>

        </div>

    </div>

</div>

@endsection