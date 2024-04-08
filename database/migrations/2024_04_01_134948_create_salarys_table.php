<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salarys', function (Blueprint $table) {
            $table->string('id_salary');
            $table->string('employee_name');
            $table->string('basic_salary');
            $table->string('transportation');
            $table->string('consumption');
            $table->string('family_allowance');
            $table->string('positional_allowance');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salarys');
    }
};