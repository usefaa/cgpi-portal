<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->paginate(10);

        return view(
            'admin.pendaftaran.index',
            compact('pendaftarans')
        );
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        return view(
            'admin.pendaftaran.show',
            compact('pendaftaran')
        );
    }

    public function terima($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $pendaftaran->update([
            'status' => 'Diterima'
        ]);

        return redirect()
            ->route('admin.pendaftaran.show', $id)
            ->with('success', 'Pendaftaran berhasil diterima');
    }

    public function tolak($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $pendaftaran->update([
            'status' => 'Ditolak'
        ]);

        return redirect()
            ->route('admin.pendaftaran.show', $id)
            ->with('success', 'Pendaftaran berhasil ditolak');
    }
}