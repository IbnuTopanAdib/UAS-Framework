<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembimbing>
 */
class PembimbingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $keahlian = ['Machine Learning', 'Frontend Developer', 'Backend Developer', 'Cloud Computing', 'Full-stack Developer', 'Cyber Security', 'UI/UX Designer', 'Mobile Developer', 'Robotic'];
        $gelar = [', S.T., M.T',', S.Kom., M.kom', ', S.Kom.', ', S.T.', ', S.Pd.', ', M.Sc., Ph.D.'];
        return [
            'nama' =>fake()->firstName() . " ".fake()->lastName() .fake()->randomElement($gelar),
            'nidn' => fake()->numerify('############'),
            'bimbingan' =>  fake()->randomElement($keahlian),
            'jenis_kelamin' => fake()->randomElement(['laki-laki','perempuan']),
            'no_hp' => fake()->numerify('62##########'),

        ];
    }
}
