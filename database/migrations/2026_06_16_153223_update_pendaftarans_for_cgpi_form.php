<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Pengecekan dilakukan satu per satu agar aman jika sebagian kolom sudah ada
            if (!Schema::hasColumn('pendaftarans', 'tanggal_pengisian')) {
                $table->date('tanggal_pengisian')->nullable();
            }

            if (!Schema::hasColumn('pendaftarans', 'nama_penanggung_jawab')) {
                $table->string('nama_penanggung_jawab')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'jabatan_penanggung_jawab')) {
                $table->string('jabatan_penanggung_jawab')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'divisi_penanggung_jawab')) {
                $table->string('divisi_penanggung_jawab')->nullable();
            }

            if (!Schema::hasColumn('pendaftarans', 'nama_kontak')) {
                $table->string('nama_kontak')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'jabatan_kontak')) {
                $table->string('jabatan_kontak')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'divisi_kontak')) {
                $table->string('divisi_kontak')->nullable();
            }

            if (!Schema::hasColumn('pendaftarans', 'telepon_kontak')) {
                $table->string('telepon_kontak')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'email_kontak')) {
                $table->string('email_kontak')->nullable();
            }

            if (!Schema::hasColumn('pendaftarans', 'status_keikutsertaan')) {
                $table->enum('status_keikutsertaan', [
                    'Berpartisipasi',
                    'Tidak Berpartisipasi'
                ])->default('Berpartisipasi');
            }

            if (!Schema::hasColumn('pendaftarans', 'expired_at')) {
                $table->timestamp('expired_at')->nullable();
            }

            if (!Schema::hasColumn('pendaftarans', 'catatan_admin')) {
                $table->text('catatan_admin')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Drop kolom hanya jika kolom tersebut eksis di database
            $columnsToDrop = [
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
                'expired_at',
                'catatan_admin',
            ];

            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('pendaftarans', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};