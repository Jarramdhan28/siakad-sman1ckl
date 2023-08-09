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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 25);
            $table->string('nama_siswa');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 15);
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('no_hp', 15);
            $table->integer('kelas_id');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
