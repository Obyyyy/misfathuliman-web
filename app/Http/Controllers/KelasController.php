<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Setting;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Data kelas — bisa dipindah ke database/model nantinya
    private function dataKelas(): array
    {
        return [
            ['slug' => 'kelas-1a', 'nama' => 'Kelas 1A', 'wali_kelas' => 'Nama Wali Kelas 1A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-1b', 'nama' => 'Kelas 1B', 'wali_kelas' => 'Nama Wali Kelas 1B', 'jumlah_siswa' => 27],
            ['slug' => 'kelas-2a', 'nama' => 'Kelas 2A', 'wali_kelas' => 'Nama Wali Kelas 2A', 'jumlah_siswa' => 30],
            ['slug' => 'kelas-2b', 'nama' => 'Kelas 2B', 'wali_kelas' => 'Nama Wali Kelas 2B', 'jumlah_siswa' => 29],
            ['slug' => 'kelas-3a', 'nama' => 'Kelas 3A', 'wali_kelas' => 'Nama Wali Kelas 3A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-3b', 'nama' => 'Kelas 3B', 'wali_kelas' => 'Nama Wali Kelas 3B', 'jumlah_siswa' => 26],
            ['slug' => 'kelas-4a', 'nama' => 'Kelas 4A', 'wali_kelas' => 'Nama Wali Kelas 4A', 'jumlah_siswa' => 30],
            ['slug' => 'kelas-4b', 'nama' => 'Kelas 4B', 'wali_kelas' => 'Nama Wali Kelas 4B', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-5a', 'nama' => 'Kelas 5A', 'wali_kelas' => 'Nama Wali Kelas 5A', 'jumlah_siswa' => 27],
            ['slug' => 'kelas-5b', 'nama' => 'Kelas 5B', 'wali_kelas' => 'Nama Wali Kelas 5B', 'jumlah_siswa' => 25],
            ['slug' => 'kelas-6a', 'nama' => 'Kelas 6A', 'wali_kelas' => 'Nama Wali Kelas 6A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-6b', 'nama' => 'Kelas 6B', 'wali_kelas' => 'Nama Wali Kelas 6B', 'jumlah_siswa' => 26],
        ];
    }

    // Halaman daftar semua kelas
    public function indexSiswa()
    {
        $title      = 'Data Siswa';
        $subtitle   = 'Daftar siswa aktif MIS Fathul Iman per kelas';
        $breadcrumbs = [
            ['label' => 'Beranda',     'url' => '/'],
            ['label' => 'Data Siswa',  'url' => ''],
        ];

        $tahun = Setting::get('tahun_ajaran', '2025');

        $kelas = Kelas::where('kelas_id', 'like', $tahun . '%')->get();

        return view('pages.siswa-index', compact('title', 'subtitle', 'breadcrumbs', 'kelas'));
    }

    // Halaman detail siswa per kelas
    public function SiswaPerKelas(string $slug)
    {
        $parsed = ltrim($slug, 'kelas-');        // → "IA", "IIB", "IIIA", dst
        $kelasNama  = substr($parsed, -1);       // → "A" atau "B"
        $tingkatNama = substr($parsed, 0, -1);   // → "I", "II", "III", dst

        $tahun = Setting::get('tahun_ajaran', '2025');
        $kelasSaat = Kelas::where('kelas_id', 'like', $tahun . '%')
        ->where('kelas_nama', $kelasNama)
        ->whereHas('tingkat', fn($q) => $q->where('tingkat_nama', $tingkatNama))
        ->firstOrFail();

        $title      = 'Kelas ' . $tingkatNama . $kelasNama;
        $subtitle   = 'Daftar siswa aktif Kelas ' . $tingkatNama . $kelasNama . ' MIS Fathul Iman';
        $breadcrumbs = [
            ['label' => 'Beranda',        'url' => '/'],
            ['label' => 'Data Siswa',     'url' => route('siswa.index')],
            ['label' => 'Kelas ' . $tingkatNama . $kelasNama, 'url' => ''],
        ];

        $siswa = Siswa::where('kelas_id', $kelasSaat->kelas_id)
        ->orderBy('siswa_nama')
        ->get();

        return view('pages.siswa-kelas', compact('title', 'subtitle', 'breadcrumbs', 'kelasSaat', 'siswa'));
    }
}