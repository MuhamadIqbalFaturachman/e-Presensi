<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('id_pinjaman');
            $table->string('nama_peminjam');
            $table->string('jumlah_pinjaman');
            $table->string('metode');
            $table->string('angsuran');
            $table->date('tanggal_pinjaman');
            $table->time('waktu_pinjaman');
            $table->timestamps();
        });
    }
};