<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::insert([
            'jenis' => 'Visi',
            'judul' => 'Terwujudnya peserta didik yang unggul dalam prestasi, berakhlakul karimah, beriman, dan bertakwa kepada Allah SWT, serta mampu menghadapi tantangan global dengan berlandaskan nilai-nilai Islam.',
            'deskripsi' => 'Visi ini merupakan cita-cita luhur yang ingin diwujudkan oleh MIS Fathul Iman dalam setiap proses pendidikan yang diselenggarakan. Kata "unggul dalam prestasi" mencerminkan komitmen madrasah untuk terus mendorong siswa berprestasi secara akademik maupun non-akademik, bersaing secara sehat di berbagai jenjang kompetisi.'
        ]);
        VisiMisi::factory(4)->create();
    }
}