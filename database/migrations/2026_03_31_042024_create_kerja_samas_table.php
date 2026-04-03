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
        Schema::create('kerja_sama', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->enum('label', ['Instansi Pemerintah', 'Perusahaan', 'Yayasan/Organisasi', 'Lembaga Pendidikan', 'Media/Komunikasi', 'Layanan Kesehatan']);
            $table->string('ikon_gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerja_samas');
    }
};
