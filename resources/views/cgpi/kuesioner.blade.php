@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-body text-center py-5">

            <h2 class="fw-bold mb-3">
                Kuesioner CGPI
            </h2>

            <p class="text-secondary mb-4">
                Silakan mengisi kuesioner Corporate Governance Perception Index (CGPI)
                melalui formulir resmi berikut.
            </p>

            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdxuF8TMJa9efPQElqOel79zl2cJm07HY7VXwB5w7xOeCtntw/viewform"
               target="_blank"
               class="btn btn-danger btn-lg">

                <i class="fas fa-clipboard-list me-2"></i>
                Isi Kuesioner

            </a>

        </div>

    </div>

</div>

@endsection