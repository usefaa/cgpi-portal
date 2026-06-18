<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'publish')
                        ->latest()
                        ->get();

        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}