<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->time('tgl_presensi');
            $table->time('jam_in');
            $table->time('jam_out');
            $table->string('foto_in');
            $table->string('foto_out');
            $table->text('lokasi_in');
            $table->text('lokasi_out');
        });
    }
};
