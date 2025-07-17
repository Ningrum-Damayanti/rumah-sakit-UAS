@extends('layouts.app')

@section('title', 'Pendaftaran Pasien')

@section('content')
<div class="section-header">
    <h1 class="text-xl font-bold text-center w-full">Formulir Pendaftaran Pasien</h1>
</div>
<div class="section-body flex justify-center">
    <div class="w-full max-w-screen-md bg-white shadow-md rounded-lg px-6 py-8 pb-12">
        <form method="POST" class="space-y-6">
            @csrf

            {{-- Nama Lengkap --}}
            <div>
                <label for="nama" class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" id="nama" name="nama"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                @error('nama') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label for="tanggal_lahir" class="block font-medium mb-1">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label for="alamat" class="block font-medium mb-1">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       value="{{ old('alamat') }}" placeholder="Masukkan alamat lengkap" required>
                @error('alamat') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- No HP --}}
            <div>
                <label for="no_hp" class="block font-medium mb-1">No. HP</label>
                <input type="text" id="no_hp" name="no_hp"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx" required>
                @error('no_hp') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Keluhan --}}
            <div>
                <label for="keluhan" class="block font-medium mb-1">Keluhan</label>
                <textarea id="keluhan" name="keluhan" rows="4"
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                          placeholder="Jelaskan keluhan Anda..." required>{{ old('keluhan') }}</textarea>
                @error('keluhan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="text-right mt-4">
                <button type="submit"
                        class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 text-center py-6">
                    <i class="fas fa-paper-plane mr-2"></i>Daftar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
