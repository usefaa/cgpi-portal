<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // PENTING: Hanya tampilkan berita yang sudah di-publish
        $query->where('status', 'publish');

        // Menangkap fitur pencarian dari form
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Tampilkan 9 berita per halaman agar grid 3x3 terlihat pas
        $beritas = $query->latest()->paginate(9);

        // Mengirimkan variabel $beritas ke view
        return view('berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        // Menampilkan detail berita berdasarkan slug
        $berita = Berita::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}