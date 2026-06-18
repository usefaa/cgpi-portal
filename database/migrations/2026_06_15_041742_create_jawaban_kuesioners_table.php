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
        Schema::create('jawaban_kuesioners', function (Blueprint $table) {

            
            $table->id();
            $table->foreignId('kuesioner_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('pertanyaan');

            $table->integer('nilai');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_kuesioners');
    }
};
