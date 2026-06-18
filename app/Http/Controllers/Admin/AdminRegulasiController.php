<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Regulasi;
use Illuminate\Http\Request;

class AdminRegulasiController extends Controller
{
    public function index()
    {
        $regulasis = Regulasi::latest()->get();

        return view('admin.regulasi.index', compact('regulasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        $namaFile = time() . '_' .
            $request->file('file')->getClientOriginalName();

        $request->file('file')->move(
            public_path('uploads/regulasi'),
            $namaFile
        );

        Regulasi::create([

            'judul' => $request->judul,

            'kategori' => $request->kategori,

            'tahun' => $request->tahun,

            'file' => 'uploads/regulasi/' . $namaFile

        ]);

        return redirect()
            ->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil ditambahkan');
    }

    public function edit(Regulasi $regulasi)
    {
        return view('admin.regulasi.edit', compact('regulasi'));
    }

    public function create()
    {
        return view('admin.regulasi.create');
    }

    public function update(Request $request, Regulasi $regulasi)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tahun' => 'required'
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun
        ];

        if ($request->hasFile('file')) {

            $namaFile = time().'_'.$request->file('file')->getClientOriginalName();

            $request->file('file')->move(
                public_path('uploads/regulasi'),
                $namaFile
            );

            $data['file'] = 'uploads/regulasi/'.$namaFile;
        }

        $regulasi->update($data);

        return redirect()
            ->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil diperbarui');
    }

    public function destroy(Regulasi $regulasi)
    {
        if (
            $regulasi->file &&
            file_exists(public_path($regulasi->file))
        ) {
            unlink(public_path($regulasi->file));
        }

        $regulasi->delete();

        return redirect()
            ->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil dihapus');
    }
}