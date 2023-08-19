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
        Schema::create('belajar', function (Blueprint $table) {
            $table->integer('kelas_id')->unsigned();
            $table->integer('pelajaran_id')->unsigned();
            $table->primary(['kelas_id', 'pelajaran_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belajar');
    }
};
