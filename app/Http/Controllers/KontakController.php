<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Menampilkan form kontak
    public function create()
    {
        return view('user.kontak'); // pastikan view-nya ada di resources/views/front/kontak.blade.php
    }

    // Menyimpan data kontak
    public function store(Request $request)
    {
        $kontak = new Kontak();
        $kontak->nama = $request->nama;
        $kontak->alamat = $request->alamat;
        $kontak->komentar = $request->komentar;
        $kontak->save();

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    // (Method lain tidak digunakan untuk sekarang, bisa dihapus atau dibiarkan kosong)
}
