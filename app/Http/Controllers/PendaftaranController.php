<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = null;

        if (auth()->check()) {
            $pendaftaran = Pendaftaran::where(
                'user_id',
                auth()->id()
            )->latest()->first();
        }

        return view(
            'cgpi.pendaftaran',
            compact('pendaftaran')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'tanggal_pengisian' => 'required',

            'nama_perusahaan' => 'required',
            'bidang_usaha' => 'required',

            'nama_penanggung_jawab' => 'required',
            'jabatan_penanggung_jawab' => 'required',
            'divisi_penanggung_jawab' => 'required',

            'nama_kontak' => 'required',
            'jabatan_kontak' => 'required',
            'divisi_kontak' => 'required',

            'telepon_kontak' => 'required',
            'email_kontak' => 'required|email',

            'status_keikutsertaan' => 'required',
        ]);

        Pendaftaran::create([

            'user_id' => auth()->id(),

            'tanggal_pengisian' => $request->tanggal_pengisian,

            'nama_perusahaan' => $request->nama_perusahaan,
            'bidang_usaha' => $request->bidang_usaha,

            // kompatibilitas database lama
            'nama_pic' => $request->nama_penanggung_jawab,
            'jabatan' => $request->jabatan_penanggung_jawab,
            'email' => $request->email_kontak,
            'telepon' => $request->telepon_kontak,
            'alamat' => '-',
            'tahun_cgpi' => date('Y'),

            // struktur baru
            'nama_penanggung_jawab' => $request->nama_penanggung_jawab,
            'jabatan_penanggung_jawab' => $request->jabatan_penanggung_jawab,
            'divisi_penanggung_jawab' => $request->divisi_penanggung_jawab,

            'nama_kontak' => $request->nama_kontak,
            'jabatan_kontak' => $request->jabatan_kontak,
            'divisi_kontak' => $request->divisi_kontak,

            'telepon_kontak' => $request->telepon_kontak,
            'email_kontak' => $request->email_kontak,

            'status_keikutsertaan' => $request->status_keikutsertaan,

            'form_pdf' => null,
            'file_ttd' => null,
            'bukti_pembayaran' => null,

            'batas_upload' => now()->addDays(7),

            'status' => 'Draft',
        ]);

        return redirect()
            ->route('pendaftaran.status')
            ->with(
                'success',
                'Formulir konfirmasi kepesertaan berhasil disimpan.'
            );
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::where(
            'user_id',
            auth()->id()
        )->latest()->first();

        return view(
            'cgpi.status-pendaftaran',
            compact('pendaftaran')
        );
    }

    public function downloadPdf($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->user_id != auth()->id()) {
            abort(403);
        }

        $pdf = Pdf::loadView(
            'pdf.formulir-cgpi',
            compact('pendaftaran')
        );

        return $pdf->download(
            'Formulir-CGPI-' .
            $pendaftaran->nama_perusahaan .
            '.pdf'
        );
    }

    public function uploadDokumen(Request $request, $id)
    {
        $request->validate([

            'file_ttd' => 'nullable|mimes:pdf|max:10240',

            'bukti_pembayaran' => 'nullable|mimes:jpg,jpeg,png,pdf|max:10240',

        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->user_id != auth()->id()) {
            abort(403);
        }

        if ($request->hasFile('file_ttd')) {

            $fileTtd = $request->file('file_ttd')
                ->store('formulir-ttd', 'public');

            $pendaftaran->file_ttd = $fileTtd;
        }

        if ($request->hasFile('bukti_pembayaran')) {

            $bukti = $request->file('bukti_pembayaran')
                ->store('bukti-pembayaran', 'public');

            $pendaftaran->bukti_pembayaran = $bukti;
        }

        if (
            $pendaftaran->file_ttd &&
            $pendaftaran->bukti_pembayaran
        ) {
            $pendaftaran->status = 'Menunggu Verifikasi';
        }

        $pendaftaran->save();

        return redirect()
            ->route('pendaftaran.status')
            ->with(
                'success',
                'Dokumen berhasil diupload.'
            );
    }
}