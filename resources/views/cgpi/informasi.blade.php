@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-body p-5">

            <!-- AWARD -->
            <div class="text-center mb-5">

                <div class="row justify-content-center">

                    <div class="col-md-3">
                        <img src="{{ asset('images/trusted.png') }}"
                             class="img-fluid"
                             style="max-height:220px;">
                    </div>

                    <div class="col-md-3">
                        <img src="{{ asset('images/most-trusted.png') }}"
                             class="img-fluid"
                             style="max-height:220px;">
                    </div>

                    <div class="col-md-3">
                        <img src="{{ asset('images/fair-trusted.png') }}"
                             class="img-fluid"
                             style="max-height:220px;">
                    </div>

                </div>

            </div>

            <!-- DESKRIPSI -->

            <div class="content-text">

                <p>
                    Corporate Governance Perception Index merupakan Program Pemeringkatan praktik Good Corporate Governance (GCG) di Perusahaan yang dilakukan sejak tahun 2001 dengan menggunakan pendekatan tematik yang menyesuaikan dengan perkembangan bisnis. Program ini merupakan program tahunan yang menilai implementasi GCG dengan rentang waktu satu tahun penuh.
                </p>

                <p>
                    IICG den Majalah SWA memberikan apresiasi den pengakuan kepada perusahaan-perusahaan yang berkomitmen menerapkan GCG dan mengikuti program CGPI melalui Indonesia Most Trusted Companies Awards.
                </p>

                <p>
                    CGPI 2020 mengangkat tema: "Membangun Ketahanan Perusahaan Dalam Kerangka Good Corporate Governance"
                </p>

                <p>
                    Untuk pendaftaran dan keterangan lebih lanjut terkait program CGPI kami, dapat menghubungi:
                </p>

            </div>

            <!-- KONTAK -->

            <div class="mt-5">

                <h4 class="fw-bold mb-3">
                    Informasi Program
                </h4>

                <p class="mb-1">
                    <strong>IICG</strong>
                </p>

                <p class="mb-1">
                    Jalan Raya Pasar Jumat No.44A Jakarta 12310
                </p>

                <p class="mb-1">
                    Telp: (021) 7695898-99
                </p>

                <p>
                    Email: secretary@iicg.org
                </p>

            </div>

            <!-- PUBLIKASI -->

            <div class="mt-5">

                <h4 class="fw-bold mb-4">
                    Publikasi CGPI
                </h4>

                <div class="row g-4">

                    @for($i=2001;$i<=2019;$i++)

                    <div class="col-lg-2 col-md-3 col-6 text-center">

                        <img src="{{ asset('images/cgpi/cgpi'.$i.'.png') }}"
                             class="img-fluid shadow-sm rounded">

                        <div class="fw-semibold mt-2">
                            CGPI {{ $i }}
                        </div>

                    </div>

                    @endfor

                </div>

            </div>

        </div>

    </div>

</div>

@endsection