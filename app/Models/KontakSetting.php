<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakSetting extends Model
{
    protected $table = 'kontak_settings';

    // Harus sama persis dengan kolom migrasi
    protected $fillable = [
        'nama_institusi', 
        'alamat', 
        'telepon', 
        'email', 
        'jam_buka', 
        'jam_tutup', 
        'instagram_url', 
        'google_maps_embed'
    ];
}