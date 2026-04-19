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
            ->paginate(8);

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

        // SEO meta
        $seoTitle       = $kategoriAktif
            ? 'Berita ' . ucfirst($kategoriAktif) . ' - MIS Fathul Iman'
            : 'Berita & Informasi Terbaru - MIS Fathul Iman';
        $seoDescription = 'Temukan berita terkini, kegiatan, dan prestasi siswa MIS Fathul Iman. '
            . 'Update informasi seputar madrasah ibtidaiyah swasta Fathul Iman.';
        $seoCanonical   = $kategoriAktif
            ? route('berita.index', ['kategori' => $kategoriAktif])
            : route('berita.index');

        return view('pages.berita.berita-index', compact(
            'title', 'subtitle', 'breadcrumbs', 'semuaBerita', 'postinganTerbaru',
            'kategoriList', 'kategoriAktif',
            'seoTitle', 'seoDescription', 'seoCanonical'
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

        // SEO meta
        $plainKonten    = strip_tags($post->konten ?? '');
        $seoTitle       = $post->judul . ' - MIS Fathul Iman';
        $seoDescription = Str::limit($plainKonten, 155);
        $seoCanonical   = route('berita.show', $post->slug);
        $seoImage       = $post->thumbnail
            ? asset('storage/' . $post->thumbnail)
            : asset('images/og-default.jpg'); // siapkan gambar default OG

        // JSON-LD Article
        $jsonLd = [
            '@context'         => 'https://schema.org',
            '@type'            => 'NewsArticle',
            'headline'         => $post->judul,
            'description'      => $seoDescription,
            'image'            => [$seoImage],
            'datePublished'    => $post->tanggal->toIso8601String(),
            'dateModified'     => $post->updated_at->toIso8601String(),
            'author'           => [
                '@type' => 'Person',
                'name'  => $post->user->name ?? 'Admin MIS Fathul Iman',
            ],
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => 'MIS Fathul Iman',
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => asset('images/logo.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => $seoCanonical,
            ],
        ];

        // JSON-LD BreadcrumbList
        $jsonLdBreadcrumb = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => collect($breadcrumbs)->filter(fn($b) => $b['url'])->values()->map(fn($b, $i) => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $b['label'],
                'item'     => $b['url'],
            ])->toArray(),
        ];

        return view('pages.berita.berita-show', compact(
            'title', 'subtitle', 'breadcrumbs',
            'post', 'postinganTerbaru', 'kategoriList',
            'seoTitle', 'seoDescription', 'seoCanonical', 'seoImage',
            'jsonLd', 'jsonLdBreadcrumb'
        ));

        return view('pages.berita.berita-show', compact(
            'title', 'subtitle', 'breadcrumbs',
            'post', 'postinganTerbaru', 'kategoriList'
        ));
    }
}
