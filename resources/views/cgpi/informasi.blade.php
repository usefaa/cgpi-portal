@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row g-4 mb-4">

        <div class="col-xl-8">

            <div class="card">

                <div class="card-body p-4">

                    <span class="badge bg-danger-subtle text-danger mb-3">
                        CORPORATE GOVERNANCE PERCEPTION INDEX
                    </span>

                    <h2 class="fw-bold mb-3">
                        Program Pemeringkatan Tata Kelola Perusahaan Indonesia
                    </h2>

                    <p class="text-muted mb-4">

                        Corporate Governance Perception Index (CGPI) merupakan program riset dan pemeringkatan implementasi Good Corporate Governance yang diselenggarakan oleh IICG untuk meningkatkan kualitas tata kelola perusahaan di Indonesia.

                    </p>

                    <div class="d-flex flex-wrap gap-2">

                        <a href="{{ route('cgpi.pendaftaran') }}"
                           class="btn btn-danger">

                            Daftar Program

                        </a>

                        <a href="#manfaat"
                           class="btn btn-light border">

                            Pelajari Lebih Lanjut

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-4">

            <div class="card h-100">

                <div class="card-body d-flex align-items-center justify-content-center">

                    <img src="{{ asset('images/IICG logo.jpeg') }}"
                         class="img-fluid"
                         style="max-height:150px;">

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="text-muted small mb-2">
                        Program
                    </div>

                    <h4 class="fw-bold mb-0">
                        CGPI
                    </h4>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="text-muted small mb-2">
                        Penyelenggara
                    </div>

                    <h4 class="fw-bold mb-0">
                        IICG
                    </h4>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="text-muted small mb-2">
                        Fokus
                    </div>

                    <h6 class="fw-bold mb-0">
                        Good Corporate Governance
                    </h6>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="text-muted small mb-2">
                        Peserta
                    </div>

                    <h6 class="fw-bold mb-0">
                        Perusahaan Indonesia
                    </h6>

                </div>

            </div>

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-3">
                Tentang CGPI
            </h4>

            <p class="text-muted mb-0">

                Corporate Governance Perception Index (CGPI) adalah program riset dan pemeringkatan yang bertujuan mendorong penerapan Good Corporate Governance secara berkelanjutan. Program ini menjadi salah satu acuan nasional dalam mengukur kualitas tata kelola perusahaan.

            </p>

        </div>

    </div>

    <div id="manfaat">

        <h4 class="fw-bold mb-4">
            Manfaat Mengikuti CGPI
        </h4>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body">

                        <h5 class="fw-bold mb-3">
                            Evaluasi Tata Kelola
                        </h5>

                        <p class="text-muted mb-0">

                            Mengukur efektivitas implementasi Good Corporate Governance secara objektif dan terstruktur.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body">

                        <h5 class="fw-bold mb-3">
                            Benchmark Nasional
                        </h5>

                        <p class="text-muted mb-0">

                            Membandingkan praktik tata kelola perusahaan dengan standar terbaik di Indonesia.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body">

                        <h5 class="fw-bold mb-3">
                            Peningkatan Reputasi
                        </h5>

                        <p class="text-muted mb-0">

                            Meningkatkan kepercayaan investor, regulator, mitra bisnis dan stakeholder perusahaan.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection