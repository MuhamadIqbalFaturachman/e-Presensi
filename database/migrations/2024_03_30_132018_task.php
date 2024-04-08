<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('id_tugas');
            $table->string('tugas');
            $table->string('jumlah_tugas');
            $table->string('status');
            $table->timestamps();
        });
    }
    
};
