@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="section-header">
    <h1 class="text-xl font-bold text-center w-full">Dashboard Pengguna</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <h2 class="text-lg mb-4 text-center">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-center mb-6">Silakan pilih menu di bawah ini untuk melanjutkan.</p>

            <div class="flex justify-center gap-4 flex-wrap mb-6">

                {{-- Menu: Pendaftaran Pasien --}}
                <a href="{{ route('user.pendaftaran.form') }}" class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 text-center py-6">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fas fa-user-plus text-3xl"></i>
                        <h4 class="text-lg font-semibold">Pendaftaran Pasien</h4>
                        <p class="text-sm">Isi formulir pendaftaran pasien</p>
                    </div>
                </a>

                {{-- Menu: Kontak Kami --}}
                <a href="{{ route('user.kontak.form') }}" class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-teal-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 text-center py-6">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fas fa-phone text-3xl"></i>
                        <h4 class="text-lg font-semibold">Kontak Kami</h4>
                        <p class="text-sm">Kirimkan pesan dan saran Anda</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection