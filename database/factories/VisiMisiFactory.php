<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisiMisi>
 */
class VisiMisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis' => 'Misi',
            'judul' => fake()->sentence(6),
            'deskripsi' => fake()->paragraphs(2, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
