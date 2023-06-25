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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('id_mahasiswa');
            $table->bigInteger('nilai_quiz');
            $table->bigInteger('nilai_tugas');
            $table->bigInteger('nilai_absensi');
            $table->bigInteger('nilai_praktik');
            $table->bigInteger('nilai_uas');
            $table->bigInteger('nilai_akhir');
            $table->string('grade_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
