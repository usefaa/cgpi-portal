<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">

<style>

    body{
        font-family: DejaVu Sans, sans-serif;
        font-size:12px;
        line-height:1.6;
    }

    .center{
        text-align:center;
    }

    .mt{
        margin-top:20px;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    td{
        padding:5px;
        vertical-align:top;
    }

    .signature{
        height:90px;
    }

</style>

</head>
<body>

<div class="center">

    <h3>
        FORMULIR KONFIRMASI KEPESERTAAN
    </h3>

    <h4>
        PROGRAM CORPORATE GOVERNANCE
        PERCEPTION INDEX (CGPI) 2025
    </h4>

</div>

<p>
    Kami yang bertandatangan di bawah ini
    menyatakan bahwa perusahaan kami:
</p>

<table>

    <tr>
        <td width="220">
            Tanggal Pengisian
        </td>
        <td>
            : {{ $pendaftaran->tanggal_pengisian }}
        </td>
    </tr>

    <tr>
        <td>
            Nama Perusahaan
        </td>
        <td>
            : {{ $pendaftaran->nama_perusahaan }}
        </td>
    </tr>

</table>

<h4 class="mt">
    Penanggung Jawab
</h4>

<table>

    <tr>
        <td width="220">Nama</td>
        <td>: {{ $pendaftaran->nama_penanggung_jawab }}</td>
    </tr>

    <tr>
        <td>Jabatan</td>
        <td>: {{ $pendaftaran->jabatan_penanggung_jawab }}</td>
    </tr>

    <tr>
        <td>Divisi</td>
        <td>: {{ $pendaftaran->divisi_penanggung_jawab }}</td>
    </tr>

</table>

<div class="signature"></div>

<p>
    __________________________
    <br>
    Tanda Tangan
</p>

<h4>
    Konfirmasi Kepesertaan
</h4>

@if($pendaftaran->status_keikutsertaan == 'Berpartisipasi')

    ☑ Berpartisipasi dalam Program Corporate Governance
    Perception Index (CGPI) 2025 yang diselenggarakan
    IICG dan Majalah SWA.

    <br><br>

    ☐ Tidak Berpartisipasi

@else

    ☐ Berpartisipasi

    <br><br>

    ☑ Tidak Berpartisipasi dalam Program Corporate Governance
    Perception Index (CGPI) 2025 yang diselenggarakan
    IICG dan Majalah SWA.

@endif

</body>
</html>
