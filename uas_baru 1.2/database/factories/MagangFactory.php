<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Magang>
 */
class MagangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul_magang' => fake()->words(2, true),
            'slug' => fake()->slug(),
            'nama_pt' => fake()->words(2,true),
            'kota' => fake()->words(2,true),
            'pekerjaan' => fake()->words(2,true),
            'tanggal_mulai' => fake()->dateTime(),
            'tanggal_selesai' => fake()->dateTime(),
            'syarat' =>collect(fake()->paragraphs(mt_rand(10,20)))
            ->map(fn($p)=> "<p>$p</p>")->implode(''),
            'rincian' =>collect(fake()->paragraphs(mt_rand(10,20)))
            ->map(fn($p)=> "<p>$p</p>")->implode(''),
        ];
    }
}
