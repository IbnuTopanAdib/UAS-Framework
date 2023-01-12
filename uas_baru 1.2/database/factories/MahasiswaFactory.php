<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $keahlian = ['Machine Learning', 'Frontend Developer', 'Backend Developer', 'Cloud Computing', 'Full-stack Developer', 'Cyber Security', 'UI/UX Designer', 'Mobile Developer', 'Roboitic'];

        return [
            'nama' => fake()->firstName() . " " . fake()->lastName(),
            'npm' => fake()->numerify('20###########'),
            'keahlian' =>  fake()->randomElement($keahlian),
            'jenis_kelamin' => fake()->randomElement(['laki-laki','perempuan']),
            'jurusan' => fake()->randomElement(['Informatika','Sistem Informasi']),

        ];
    }
}
