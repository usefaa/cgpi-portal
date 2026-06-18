<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Berita;
use App\Models\Regulasi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'totalUser' => User::count(),
            'totalBerita' => Berita::count(),
            'totalRegulasi' => Regulasi::count(),

            'latestBerita' => Berita::latest()
                ->take(5)
                ->get(),

            'latestRegulasi' => Regulasi::latest()
                ->take(5)
                ->get(),

            'totalPendaftaran' => 0,

        ]);
    }
}