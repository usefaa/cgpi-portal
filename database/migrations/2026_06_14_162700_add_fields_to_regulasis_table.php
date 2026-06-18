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
        Schema::table('regulasis', function (Blueprint $table) {

            $table->string('judul');

            $table->enum('kategori', [
                'UU & PP',
                'OJK',
                'KBUMN'
            ]);

            $table->year('tahun');

            $table->string('file');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regulasis', function (Blueprint $table) {

            $table->dropColumn([
                'judul',
                'kategori',
                'tahun',
                'file'
            ]);

        });
    }
};
