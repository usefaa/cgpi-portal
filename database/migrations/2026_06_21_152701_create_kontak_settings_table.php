<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontak_settings', function (Blueprint $table) {
            $table->id();
            // Perhatikan: Menggunakan nama_institusi, jam_buka, jam_tutup
            $table->string('nama_institusi')->default('IICG');
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            $table->string('instagram_url')->nullable();
            $table->text('google_maps_embed')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontak_settings');
    }
};