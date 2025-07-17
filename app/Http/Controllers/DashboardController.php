<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Kontak;
use App\Models\JadwalDokter;

class DashboardController extends Controller
{
    public function index()
    {
        $pasien = Pendaftaran::latest()->get();
        $kontaks = Kontak::latest()->get();
        $jadwals = JadwalDokter::with('dokter')->latest()->get();

        return view('dashboard', compact('pasien', 'kontaks', 'jadwals'));
    }
}
