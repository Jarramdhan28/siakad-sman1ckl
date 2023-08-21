<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $dataKelas = collect(['X MIPA 1', 'X MIPA 2', 'X MIPA 3', 'X MIPA 4', 'X IPS 1', 'X IPS. 2', 'X IPS 3','XI MIPA 1', 'XI MIPA 2', 'XI MIPA 3', 'XI MIPA 4', 'XI IPS 1', 'XI IPS 2', 'XI IPS 3','XII MIPA 1', 'XII MIPA 2', 'XII MIPA 3', 'XII IPS 1', 'XII IPS 2', 'XII IPS 3', 'XII IPS 4']);
        $dataKelas->each(function($namaKelas){
            Kelas::create(['nama_kelas' => $namaKelas])->each(function($kelas){
                Siswa::factory(1)->create(['kelas_id' => $kelas->id]);
            });
        });
    }
}
