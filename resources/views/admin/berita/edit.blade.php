@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Edit Berita
        </h2>

        <a href="{{ route('admin.berita.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.berita.update',$berita->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ $berita->judul }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Saat Ini
                    </label>

                    <br>

                    @if($berita->gambar)

                        <img src="{{ asset($berita->gambar) }}"
                             width="150"
                             class="rounded">

                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Ganti Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              rows="10"
                              class="form-control"
                              required>{{ $berita->isi }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="publish"
                            {{ $berita->status == 'publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                        <option value="draft"
                            {{ $berita->status == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-danger">

                    Update Berita

                </button>

            </form>

        </div>

    </div>

</div>

@endsection