<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('front.pendaftaran'); // ini untuk akses umum (tanpa login)
    }

    public function create()
    {
        return view('user.pendaftaran'); // ini form untuk user yang login
    }

    public function store(Request $request)
    {
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama = $request->nama;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->no_hp = $request->no_hp;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->save();

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
