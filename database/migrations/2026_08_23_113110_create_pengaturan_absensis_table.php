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
        Schema::create('pengaturan_absensis', function (Blueprint $table) {
            $table->id();
            $table->time('batas_hadir')->default('07:00:00');
            $table->time('jam_pulang_jumat')->default('10:30:00');
            $table->time('jam_pulang_sabtu')->default('12:00:00');
            $table->time('jam_pulang_biasa')->default('13:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_absensis');
    }
};