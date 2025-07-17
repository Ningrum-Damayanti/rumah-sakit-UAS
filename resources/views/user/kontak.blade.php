@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="section-header">
    <h1 class="text-xl font-bold text-center w-full">Formulir Kontak</h1>
</div>
<div class="section-body flex justify-center">
    <div class="w-full max-w-screen-md bg-white shadow-md rounded-lg px-6 py-8 pb-12">
        <form method="POST" action="{{ route('user.kontak.store') }}" class="space-y-6">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block font-medium mb-1">Nama</label>
                <input type="text" id="nama" name="nama"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       placeholder="Masukkan nama Anda" required>
                @error('nama') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label for="alamat" class="block font-medium mb-1">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       placeholder="Masukkan alamat Anda" required>
                @error('alamat') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Komentar --}}
            <div>
                <label for="komentar" class="block font-medium mb-1">Komentar</label>
                <textarea id="komentar" name="komentar" rows="4"
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                          placeholder="Tulis komentar Anda" required></textarea>
                @error('komentar') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Kirim --}}
            <div class="text-right mt-4">
                <button type="submit"
                        class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                        hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                        transform hover:scale-105 active:scale-95 text-center py-6">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
