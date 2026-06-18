@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="card border-0 shadow-sm overflow-hidden mb-5">

    <div class="card-body p-5 text-white"
         style="background:linear-gradient(135deg,#ED1C24,#C1121F);border-radius:20px;">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-light text-danger px-3 py-2 mb-3">
                    PROGRAM CGPI 2025
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Corporate Governance Perception Index
                </h1>

                <p class="fs-5 mb-3">
                    Tema:
                    <strong>
                        "Membangun Ekosistem Bisnis dalam Kerangka GCG"
                    </strong>
                </p>

                <p class="mb-0">
                    Periode Pelaksanaan:
                    Mei – November 2026
                </p>

            </div>

            <div class="col-lg-4 text-center">

                <i class="fas fa-file-signature"
                   style="font-size:120px;opacity:.15;"></i>

            </div>

        </div>

    </div>

</div>

<!-- INFORMASI -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body p-5">

        <h2 class="fw-bold mb-4">
            Informasi Kepesertaan
        </h2>

        <p class="text-secondary fs-5">
            Corporate Governance Perception Index (CGPI)
            merupakan program riset dan pemeringkatan
            implementasi Good Corporate Governance (GCG)
            yang diselenggarakan oleh IICG bersama Majalah SWA.
        </p>

        <p class="text-secondary">
            Peserta akan mengikuti seluruh tahapan penilaian
            untuk mengukur kualitas tata kelola perusahaan
            secara komprehensif dan berkelanjutan.
        </p>

    </div>

</div>

<!-- INVESTASI -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body p-5">

        <h2 class="fw-bold mb-4">
            Investasi Kepesertaan
        </h2>

        <div class="alert alert-danger p-4">

            <h1 class="fw-bold mb-2">
                Rp 50.000.000
            </h1>

            <p class="mb-0">
                Biaya kepesertaan Program CGPI 2025
            </p>

        </div>

        <ul class="mt-4">

            <li>Mengikuti seluruh tahapan penilaian CGPI.</li>
            <li>Mendapatkan hasil assessment tata kelola.</li>
            <li>Benchmark dengan perusahaan terbaik.</li>
            <li>Pengakuan dan pemeringkatan nasional.</li>

        </ul>

    </div>

</div>

<!-- TAHAPAN -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body p-5">

        <h2 class="fw-bold mb-5">
            Tahapan Program
        </h2>

        <div class="row text-center">

            <div class="col-md">
                <div class="step-box">
                    <span>1</span>
                    <p>Konfirmasi</p>
                </div>
            </div>

            <div class="col-md">
                <div class="step-box">
                    <span>2</span>
                    <p>Kuesioner</p>
                </div>
            </div>

            <div class="col-md">
                <div class="step-box">
                    <span>3</span>
                    <p>Assessment</p>
                </div>
            </div>

            <div class="col-md">
                <div class="step-box">
                    <span>4</span>
                    <p>Penilaian</p>
                </div>
            </div>

            <div class="col-md">
                <div class="step-box">
                    <span>5</span>
                    <p>Pemeringkatan</p>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- FORM PENDAFTARAN -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body p-5">

        <div class="d-flex align-items-center mb-4">
            <i class="fas fa-file-signature text-danger fs-2 me-3"></i>
            <div>
                <h2 class="fw-bold mb-0">
                    Formulir Konfirmasi Kepesertaan
                </h2>
                <small class="text-muted">
                    Lengkapi data berikut untuk mengikuti Program CGPI
                </small>
            </div>
        </div>

        <form action="{{ route('pendaftaran.store') }}" method="POST">

            @csrf

            <h4 class="fw-bold mb-4">
                Informasi Perusahaan
            </h4>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Tanggal Pengisian
                    </label>

                    <input type="date"
                        name="tanggal_pengisian"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Nama Perusahaan
                    </label>

                    <input type="text"
                        name="nama_perusahaan"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Bidang Usaha
                    </label>

                    <input type="text"
                        name="bidang_usaha"
                        class="form-control"
                        required>

                </div>

            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-4">
                Penanggung Jawab
            </h4>

            <div class="mb-3">

                <label class="form-label">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="nama_penanggung_jawab"
                    class="form-control"
                    required>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Jabatan
                    </label>

                    <input type="text"
                        name="jabatan_penanggung_jawab"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Divisi
                    </label>

                    <input type="text"
                        name="divisi_penanggung_jawab"
                        class="form-control"
                        required>

                </div>

            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-4">
                Konfirmasi Kepesertaan
            </h4>

            <div class="row g-3">

                <div class="col-md-6">

                    <input type="radio"
                        class="btn-check"
                        name="status_keikutsertaan"
                        id="ikut"
                        value="Berpartisipasi"
                        checked>

                    <label class="card h-100 border-danger shadow-sm p-4 w-100"
                        for="ikut"
                        style="cursor:pointer;">

                        <div class="d-flex align-items-start">

                            <i class="fas fa-check-circle text-success fs-3 me-3"></i>

                            <div>

                                <h5 class="fw-bold text-danger">
                                    Berpartisipasi
                                </h5>

                                <p class="mb-0 text-muted">

                                    Mengikuti Program Corporate
                                    Governance Perception Index
                                    (CGPI) 2025 yang diselenggarakan
                                    oleh IICG dan Majalah SWA.

                                </p>

                            </div>

                        </div>

                    </label>

                </div>

                <div class="col-md-6">

                    <input type="radio"
                        class="btn-check"
                        name="status_keikutsertaan"
                        id="tidak_ikut"
                        value="Tidak Berpartisipasi">

                    <label class="card h-100 shadow-sm p-4 w-100"
                        for="tidak_ikut"
                        style="cursor:pointer;">

                        <div class="d-flex align-items-start">

                            <i class="fas fa-times-circle text-secondary fs-3 me-3"></i>

                            <div>

                                <h5 class="fw-bold">
                                    Tidak Berpartisipasi
                                </h5>

                                <p class="mb-0 text-muted">

                                    Tidak mengikuti Program Corporate
                                    Governance Perception Index
                                    (CGPI) 2025 yang diselenggarakan
                                    oleh IICG dan Majalah SWA.

                                </p>

                            </div>

                        </div>

                    </label>

                </div>

            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-4">
                Kontak yang Dapat Dihubungi
            </h4>

            <div class="mb-3">

                <label class="form-label">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="nama_kontak"
                    class="form-control"
                    required>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Jabatan
                    </label>

                    <input type="text"
                        name="jabatan_kontak"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Divisi
                    </label>

                    <input type="text"
                        name="divisi_kontak"
                        class="form-control"
                        required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Telepon / HP
                    </label>

                    <input type="text"
                        name="telepon_kontak"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                        name="email_kontak"
                        class="form-control"
                        required>

                </div>

            </div>

            <div class="text-end mt-4">

                <button type="submit"
                        class="btn btn-danger btn-lg">

                    <i class="fas fa-paper-plane me-2"></i>
                    Kirim Pendaftaran

                </button>

            </div>

        </form>

    </div>

</div>

<!-- KETENTUAN -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body p-5">

        <h2 class="fw-bold mb-4">
            Ketentuan Kepesertaan
        </h2>

        <ul>

            <li>Bersedia mengikuti seluruh tahapan penilaian CGPI.</li>

            <li>
                Bersedia membayar biaya kepesertaan sebesar
                Rp50.000.000.
            </li>

            <li>
                Pembayaran dilakukan maksimal
                30 hari kerja setelah konfirmasi.
            </li>

            <li>
                Biaya transportasi dan akomodasi
                peserta luar Jakarta ditanggung perusahaan.
            </li>

            <li>
                Investasi kepesertaan yang telah dibayarkan
                tidak dapat direfund.
            </li>

        </ul>

    </div>

</div>

<!-- KONTAK -->
<div class="card border-0 shadow-sm">

    <div class="card-body p-5 text-center">

        <h2 class="fw-bold mb-3">
            Hubungi IICG
        </h2>

        <p>
            Telp: (021) 7695898-99
        </p>

        <p>
            WhatsApp: 0821-11515868
        </p>

        <p>
            Email: secretary@iicg.org
        </p>

    </div>

</div>

@endsection