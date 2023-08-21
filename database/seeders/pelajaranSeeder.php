<?php

namespace Database\Seeders;

use App\Models\Pelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPelajaran = collect(['Bahasa Indonesia', 'Bahasa Inggris', 'Pendidikan Kewarganegaraan', 'Matematika', 'Biologi', 'Fisika', 'Kimia', 'PJOK', 'Seni Budaya', 'BK IT', 'Bimbingan dan Konseling', 'PAI', 'Sejarah Indonesia', 'Sosiologi', 'Ekonomi', 'PKWU']);
        $dataPelajaran->each(function($pelajaran){
            Pelajaran::create(['nama_pelajaran' => $pelajaran]);
        });
    }
}
