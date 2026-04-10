<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul    = $this->faker->sentence(8);
        return [
            'slug'          => Str::slug($judul) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'judul'         => $judul,
            'konten'        => '<p>' . implode('</p><p>', $this->faker->paragraphs(4)) . '</p>',
            'user_id'       => 1,
            'tanggal'       => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'kategori_id'      => $this->faker->numberBetween(1, 2),
            'thumbnail'     => null,
            'views'         => $this->faker->numberBetween(50, 100),
        ];
    }
}