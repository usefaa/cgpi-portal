<?php

namespace App\Http\Controllers;

use App\Models\KontakSetting;
use Illuminate\Http\Request;

class KontakSettingController extends Controller
{
    // 1. Tampilan untuk Sisi User (Foto 1)
    public function index()
    {
        // Ambil data pertama karena pengaturan ini hanya ada 1 baris/record
        $setting = KontakSetting::first(); 
        return view('kontak.index', compact('setting'));
    }

    // 2. Tampilan Form Edit untuk Sisi Admin (Foto 2)
    public function adminEdit()
    {
        $setting = KontakSetting::first();
        return view('admin.pengaturan.index', compact('setting'));
    }

    // 3. Proses Update Data dari Admin Form
    public function adminUpdate(Request $request)
    {
        $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'email' => 'nullable|email',
            'jam_buka' => 'nullable',
            'jam_tutup' => 'nullable',
        ]);

            $setting = KontakSetting::firstOrFail();
        $setting->update($request->all());
    
        return redirect()->back()->with('success', 'Pengaturan kontak berhasil diperbarui!');
    }
}