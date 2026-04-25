<?php

namespace App\Http\Controllers;

use App\Mail\PesanKontak;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $title      = 'Kontak Kami';
        $subtitle   = 'Hubungi kami untuk informasi lebih lanjut';
        $breadcrumbs = [
            ['label' => 'Beranda',    'url' => '/'],
            ['label' => 'Kontak',     'url' => ''],
        ];

        $contacts = Kontak::all();

        return view('pages.kontak', compact('title', 'subtitle', 'breadcrumbs', 'contacts'));
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:100'],
            'telepon' => ['nullable', 'string', 'max:20'],
            'subjek'  => ['required', 'string'],
            'pesan'   => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'nama.required'   => 'Nama lengkap wajib diisi.',
            'email.required'  => 'Alamat email wajib diisi.',
            'email.email'     => 'Format email tidak valid.',
            'subjek.required' => 'Subjek pesan wajib dipilih.',
            'pesan.required'  => 'Pesan wajib diisi.',
            'pesan.min'       => 'Pesan minimal 10 karakter.',
        ]);

        try {
            // Kirim email ke alamat sekolah
            Mail::to(config('mail.to_address'))
                ->send(new PesanKontak($validated));

            return redirect()
                ->route('kontak')
                ->with('success', 'Pesan Anda berhasil dikirim! Kami akan membalas secepatnya.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi atau hubungi kami langsung.');
        }
    }
}