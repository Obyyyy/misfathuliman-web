<?php

namespace Database\Seeders;

use App\Models\KerjaSama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KerjaSamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KerjaSama::factory(4)->create();
    }
}
