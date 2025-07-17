<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalDokter;
use App\Models\User;
use DataTables;


class JadwalDokterController extends Controller
{
    // Menampilkan halaman index dengan DataTables (untuk admin)
    public function index()
{
    $jadwals = JadwalDokter::with('dokter')->get(); // relasi ke tabel dokter
    return view('jadwal_dokter.index', compact('jadwals'));
}


    // Endpoint AJAX untuk DataTables
    public function getData()
    {
        $data = JadwalDokter::with('dokter')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama_dokter', function ($row) {
                return optional($row->dokter)->name ?? '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <form action="' . route('jadwal-dokter.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Yakin hapus jadwal?\')">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Form tambah jadwal (admin)
    public function create()
    {
        $dokters = User::where('role', 'dokter')->get(); // hanya user dengan role dokter
        return view('jadwal_dokter.create', compact('dokters'));
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'poli' => 'required|string|max:100',
        ]);

        JadwalDokter::create([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'poli' => $request->poli,
        ]);

        return redirect()->route('jadwal-dokter.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // Untuk dokter melihat jadwal miliknya sendiri
    public function jadwalSaya()
    {
        $user = auth()->user();

        $jadwals = JadwalDokter::where('dokter_id', $user->id)->get();

        return view('dokter.jadwal_saya', compact('jadwals'));
    }

    // Hapus jadwal
    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-dokter.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
