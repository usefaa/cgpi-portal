<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {

            $table->id();

            $table->string('nama_perusahaan');

            $table->string('bidang_usaha');

            $table->string('nama_pic');

            $table->string('jabatan');

            $table->string('email');

            $table->string('telepon');

            $table->text('alamat');

            $table->year('tahun_cgpi');

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
