<?php

namespace Database\Factories;

use Faker\Provider\id_ID\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement([Person::GENDER_MALE, Person::GENDER_FEMALE]);
        return [
            'nis' => fake()->unique()->randomNumber(6, true),
            'nama_siswa' => fake()->name($gender),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => $gender === 'male' ? 'Laki-laki' : 'Perempuan',
            'alamat' => fake()->address(),
            'email' => fake()->email(),
            'no_hp' => "0812" . fake()->randomNumber(8, true),
            'kelas_id' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]),
            'password' => bcrypt('password')
        ];
    }
}
