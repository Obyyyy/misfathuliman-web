<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // =============================================
    // HALAMAN DAFTAR BERITA
    // =============================================
    public function indexBerita(Request $request)
    {
        $kategoriAktif = $request->query('kategori');
        $semuaBerita = Berita::with(['kategoriBerita', 'user'])
            ->when($kategoriAktif, fn($q) => $q->whereHas('kategoriBerita', fn($q) => $q->where('slug', $kategoriAktif)))
            ->orderByDesc('tanggal')
            ->paginate(8);;

        $postinganTerbaru = Berita::with('kategoriBerita')
            ->orderByDesc('tanggal')
            ->take(4)
            ->get();

        $kategoriList = KategoriBerita::all();

        $title      = 'Berita & Informasi';
        $subtitle   = 'Ikuti berita terkini seputar kegiatan dan prestasi MIS Fathul Iman';
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Berita',  'url' => ''],
        ];

        return view('pages.berita.berita-index', compact(
            'title', 'subtitle', 'breadcrumbs', 'semuaBerita', 'postinganTerbaru',
            'kategoriList', 'kategoriAktif'
        ));
    }

    // =============================================
    // HALAMAN DETAIL BERITA
    // =============================================
    public function showBerita(string $slug)
    {
        $post = Berita::with(['kategoriBerita', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views
        $post->incrementViews();

        abort_if(!$post, 404);

        $postinganTerbaru = Berita::with('kategoriBerita')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        $kategoriList = KategoriBerita::all();

        $title      = $post->judul;
        $subtitle   = $post->kategoriBerita->judul . ' · ' . \Carbon\Carbon::parse($post->tanggal)->translatedFormat('d F Y');
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Berita',  'url' => route('berita.index')],
            ['label' => $post->kategoriBerita?->judul ?? 'Berita', 'url' => route('berita.index', ['kategori' => $post->kategoriBerita?->slug])],
            ['label' => Str::limit($post->judul, 30), 'url' => ''],
        ];

        return view('pages.berita.berita-show', compact(
            'title', 'subtitle', 'breadcrumbs',
            'post', 'postinganTerbaru', 'kategoriList'
        ));
    }
}