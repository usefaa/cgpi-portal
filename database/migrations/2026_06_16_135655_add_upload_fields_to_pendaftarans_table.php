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
        Schema::table('pendaftarans', function (Blueprint $table) {

            $table->foreignId('user_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('form_pdf')
                ->nullable()
                ->after('tahun_cgpi');

            $table->string('file_ttd')
                ->nullable()
                ->after('form_pdf');

            $table->string('bukti_pembayaran')
                ->nullable()
                ->after('file_ttd');

            $table->timestamp('batas_upload')
                ->nullable()
                ->after('bukti_pembayaran');

            $table->enum('status', [
                'Draft',
                'Menunggu Verifikasi',
                'Diterima',
                'Ditolak',
                'Expired'
            ])->default('Draft')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {

            $table->dropForeign(['user_id']);

            $table->dropColumn([
                'user_id',
                'form_pdf',
                'file_ttd',
                'bukti_pembayaran',
                'batas_upload'
            ]);

        });
    }
};