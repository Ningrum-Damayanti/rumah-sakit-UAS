@extends('layouts.app')

@section('content')
<div class="section-header mb-4">
    <h1 class="text-[20px] font-bold text-center w-full">Tambah Jadwal Dokter</h1>
</div>

@if ($errors->any())
<div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('jadwal-dokter.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="dokter_id" class="block font-semibold mb-1">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="hari" class="block font-semibold mb-1">Hari</label>
                <select name="hari" id="hari" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    <option value="">-- Pilih Hari --</option>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                    <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="jam_mulai" class="block font-semibold mb-1">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label for="jam_selesai" class="block font-semibold mb-1">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label for="poli" class="block font-semibold mb-1">Poli</label>
                <input type="text" name="poli" id="poli" placeholder="Contoh: Poli Anak"
                    class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div class="flex items-center space-x-2 pt-4">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
                <a href="{{ route('jadwal-dokter.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
