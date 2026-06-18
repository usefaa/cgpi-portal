<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('uploads/berita'),
                $namaFile
            );

            $gambar = 'uploads/berita/' . $namaFile;
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'gambar' => $gambar,
            'isi' => $request->isi,
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $gambar = $berita->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/berita'),
                $namaFile
            );

            $gambar = 'uploads/berita/'.$namaFile;
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'gambar' => $gambar,
            'isi' => $request->isi,
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        // hapus file gambar jika ada
        if ($berita->gambar) {

            $path = public_path($berita->gambar);

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}