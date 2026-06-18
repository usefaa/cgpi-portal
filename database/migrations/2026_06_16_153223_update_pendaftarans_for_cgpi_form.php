<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {

            $table->date('tanggal_pengisian')->nullable();

            $table->string('nama_penanggung_jawab')->nullable();
            $table->string('jabatan_penanggung_jawab')->nullable();
            $table->string('divisi_penanggung_jawab')->nullable();

            $table->string('nama_kontak')->nullable();
            $table->string('jabatan_kontak')->nullable();
            $table->string('divisi_kontak')->nullable();

            $table->string('telepon_kontak')->nullable();
            $table->string('email_kontak')->nullable();

            $table->enum('status_keikutsertaan', [
                'Berpartisipasi',
                'Tidak Berpartisipasi'
            ])->default('Berpartisipasi');

            $table->timestamp('expired_at')->nullable();

            $table->text('catatan_admin')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {

            $table->dropColumn([
                'tanggal_pengisian',

                'nama_penanggung_jawab',
                'jabatan_penanggung_jawab',
                'divisi_penanggung_jawab',

                'nama_kontak',
                'jabatan_kontak',
                'divisi_kontak',

                'telepon_kontak',
                'email_kontak',

                'status_keikutsertaan',

                'file_ttd',
                'bukti_pembayaran',

                'expired_at',

                'catatan_admin',
            ]);
        });
    }
};