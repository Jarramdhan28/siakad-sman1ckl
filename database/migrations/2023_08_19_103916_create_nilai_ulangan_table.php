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
        Schema::create('nilai_ulangan', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id')->unsigned();
            $table->integer('pelajaran_id')->unsigned();
            $table->string('jenis_nilai');
            $table->string('nama_nilai')->nullable()->default(null);
            $table->double('nilai', 9.2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ulangan');
    }
};
