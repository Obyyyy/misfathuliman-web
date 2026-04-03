<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::insert([
            [
                'name' => 'Alamat',
                'value' => 'Jl. RTA Milono Km. 2,5 No.44, Langkai, Kec. Pahandut, Kota Palangka Raya, Kalimantan Tengah, 74874'
            ],
            [
                'name' => 'Email',
                'value' => 'info@misfathuliman.com'
            ],
            [
                'name' => 'Telepon',
                'value' => '(021) 1234 5678 / 0812 3456 7890'
            ]
        ]);
    }
}
