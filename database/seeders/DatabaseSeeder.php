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
        $dataKelas = collect(['X.MIPA. 1', 'X.MIPA. 2', 'X.MIPA. 3', 'X.IPS. 1', 'X.IPS. 2', 'X.IPS. 3', 'XI. MIA. 1', 'XI. MIA 2']);
        $dataKelas->each(function($namaKelas){
            $kelas = Kelas::create(['nama_kelas' => $namaKelas]);
            Siswa::factory(15)->create(['kelas_id' => $kelas->id]);
        });
    }
}
