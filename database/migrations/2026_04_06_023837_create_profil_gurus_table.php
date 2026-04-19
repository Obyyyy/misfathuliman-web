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
        Schema::create('profil_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('nip')->nullable()->unique()->comment('Nomor Induk Pegawai');
            $table->enum('pendidikan', [
                'SMA/SMK/MA',
                'Diploma (D3)',
                'Sarjana (S1)',
                'Magister (S2)',
                'Doktor (S3)',
            ])->default('Sarjana (S1)');
            $table->enum('jabatan', [
                'Kepala Madrasah',
                'Wakil Kepala Madrasah',
                'Guru Kelas',
                'Guru Mata Pelajaran',
                'Staf',
            ])->nullable();
            $table->string('nama_jabatan')->nullable()
                ->comment('Detail jabatan, contoh: Wali Kelas 1A, Mapel PJOK');
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_guru');
    }
};