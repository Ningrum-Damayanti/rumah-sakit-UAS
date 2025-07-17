<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalDokterController;

// ==========================
// 🔹 Halaman Beranda
// ==========================
Route::get('/', function () {
    return view('front.home');
})->name('home.index');

// ==========================
// 🔐 Login Redirect Otomatis
// ==========================
Route::get('/redirect-after-login', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('dashboard');
    } elseif (auth()->user()->role === 'user') {
        return redirect()->route('user.dashboard');
    } elseif (auth()->user()->role === 'dokter') {
        return redirect()->route('jadwal-dokter.index');
    }
    abort(403, 'Role tidak dikenal');
})->middleware('auth');

// ==========================
// 👨‍💼 ADMIN
// ==========================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 🔹 Jadwal Dokter (Admin)
    Route::resource('jadwal_dokters', JadwalDokterController::class);
    Route::get('/jadwal-dokter/data', [JadwalDokterController::class, 'getData'])->name('jadwal-dokter.data');
    Route::get('/jadwal-dokter', [JadwalDokterController::class, 'index'])->name('jadwal-dokter.index');
    Route::get('/jadwal-dokter/create', [JadwalDokterController::class, 'create'])->name('jadwal-dokter.create');
    Route::post('/jadwal-dokter', [JadwalDokterController::class, 'store'])->name('jadwal-dokter.store');
    Route::get('/jadwal-dokter/{id}/edit', [JadwalDokterController::class, 'edit'])->name('jadwal-dokter.edit');
    Route::put('/jadwal-dokter/{id}', [JadwalDokterController::class, 'update'])->name('jadwal-dokter.update');
    Route::delete('/jadwal-dokter/{id}', [JadwalDokterController::class, 'destroy'])->name('jadwal-dokter.destroy');

    // 🔹 Alternatif Prefix /admin/jadwal
    Route::prefix('admin')->name('admin.jadwal-dokter.')->group(function () {
        Route::get('/jadwal', [JadwalDokterController::class, 'index'])->name('index');
        Route::get('/jadwal/create', [JadwalDokterController::class, 'create'])->name('create');
        Route::post('/jadwal', [JadwalDokterController::class, 'store'])->name('store');
        Route::get('/jadwal/{id}/edit', [JadwalDokterController::class, 'edit'])->name('edit');
        Route::put('/jadwal/{id}', [JadwalDokterController::class, 'update'])->name('update');
        Route::delete('/jadwal/{id}', [JadwalDokterController::class, 'destroy'])->name('destroy');
    });
});

// ==========================
// 👤 USER (Pasien)
// ==========================
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.form');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    Route::get('/kontak', [KontakController::class, 'create'])->name('kontak.form');
    Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
});

// ==========================
// 👨‍⚕️ DOKTER
// ==========================
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('jadwal-dokter.')->group(function () {
    Route::get('/jadwal', [JadwalDokterController::class, 'jadwalSaya'])->name('index');
});

// ==========================
// ⚙️ PROFILE
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/visi-misi', function () {
    return view('front.visi_misi');
})->name('visi_misi');

Route::get('/sambutan-direktur', function () {
    return view('front.sambutan_direktur');
})->name('sambutan_direktur');


// ==========================
// 🛡️ AUTH (Laravel Breeze)
// ==========================
require __DIR__.'/auth.php';
