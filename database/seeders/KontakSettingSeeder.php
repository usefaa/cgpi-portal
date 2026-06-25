<?php

namespace Database\Seeders;

use App\Models\KontakSetting;
use Illuminate\Database\Seeder;

class KontakSettingSeeder extends Seeder
{
    public function run(): void
    {
        KontakSetting::create([
            'nama_institusi' => 'Indonesia Corporate Governance Institute (IICG)',
            'alamat' => 'Alamat kantor resmi IICG di sini...',
            'telepon' => '081234567890',
            'email' => 'contact@iicg-website.test',
            'jam_buka' => '09:00:00',
            'jam_tutup' => '17:00:00',
            'instagram_url' => 'https://www.instagram.com/iicg_id',
            'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?..." width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
        ]);
    }
}