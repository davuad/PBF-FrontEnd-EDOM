<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\MatkulController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Mahasiswa\RiwayatController;
use App\Http\Controllers\Dosen\HasilPenilaianController;
use App\Http\Controllers\Mahasiswa\IsiPenilaianController;

// Halaman utama
Route::get('/', fn() => view('login'));

// Dashboard
Route::get('/dashboard', fn() => view('dashboard.index'));

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.index'))->name('index');

    Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');              // List Dosen
    Route::get('dosen/tambah', [DosenController::class, 'create'])->name('dosen.tambah');     // Form Tambah
    Route::post('dosen/simpan', [DosenController::class, 'store'])->name('dosen.simpan');     // Simpan Tambah
    Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');      // Form Edit
    Route::put('dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update'); // Simpan Edit
    Route::delete('dosen/hapus/{id}', [DosenController::class, 'destroy'])->name('dosen.hapus'); // Hapus

    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');              // List mahasiswa
    Route::get('mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('mahasiswa.tambah');     // Form Tambah
    Route::post('mahasiswa/simpan', [MahasiswaController::class, 'store'])->name('mahasiswa.simpan');     // Simpan Tambah
    Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');      // Form Edit
    Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // Simpan Edit
    Route::delete('mahasiswa/hapus/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.hapus'); // Hapus

    Route::get('matkul', [MatkulController::class, 'index'])->name('matkul.index');              // List matkul
    Route::get('matkul/tambah', [MatkulController::class, 'create'])->name('matkul.tambah');     // Form Tambah
    Route::post('matkul/simpan', [MatkulController::class, 'store'])->name('matkul.simpan');     // Simpan Tambah
    Route::get('matkul/edit/{id}', [MatkulController::class, 'edit'])->name('matkul.edit');      // Form Edit
    Route::put('matkul/update/{id}', [MatkulController::class, 'update'])->name('matkul.update'); // Simpan Edit
    Route::delete('matkul/hapus/{id}', [MatkulController::class, 'destroy'])->name('matkul.hapus'); // Hapus

    Route::get('prodi', [ProdiController::class, 'index'])->name('prodi.index');              // List prodi
    Route::get('prodi/tambah', [ProdiController::class, 'create'])->name('prodi.tambah');     // Form Tambah
    Route::post('prodi/simpan', [ProdiController::class, 'store'])->name('prodi.simpan');     // Simpan Tambah
    Route::get('prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');      // Form Edit
    Route::put('prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update'); // Simpan Edit
    Route::delete('prodi/hapus/{id}', [ProdiController::class, 'destroy'])->name('prodi.hapus'); // Hapus

    Route::get('rekap', [PenilaianController::class, 'index'])->name('penilaian.index');
    // Route::view('penilaian', 'admin.penilaian')->name('penilaian');
    // Route::view('rekap', 'admin.rekap')->name('rekap');
});

//  MAHASISWA 
Route::prefix('mahasiswa')->name('mahasiswa.')->group(
    function () {
        Route::get('/', fn() => view('mahasiswa.index'))->name('index');

        Route::get('penilaian', [IsiPenilaianController::class, 'index'])->name('isi_penilaian');
        Route::get('penilaian/tambah/{id_dosen}', [IsiPenilaianController::class, 'create'])->name('tambah_penilaian');

        Route::post('penilaian/simpan', [IsiPenilaianController::class, 'store'])->name('simpan_penilaian');
        Route::get('penilaian/edit/{id}', [IsiPenilaianController::class, 'edit'])->name('edit_penilaian');
        Route::put('penilaian/update/{id}', [IsiPenilaianController::class, 'update'])->name('update_penilaian');
        Route::get('penilaian/hapus/{id}', [IsiPenilaianController::class, 'destroy'])->name('hapus_penilaian');

        Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat_penilaian');
    }
);

// DOSEN 
Route::prefix('dosen')->name('dosen.')->group(
    function () {
        Route::get('/', fn() => view('dosen.index'))->name('index');

        Route::get('hasil_penilaian', [HasilPenilaianController::class, 'index'])->name('hasil_penilaian');
        Route::get('saran', [HasilPenilaianController::class, 'saran'])->name('saran');
        
    }
);

// Penilaian umum (dashboard)
Route::view('/penilaian', 'dashboard.index');

// =============== AUTH ==========================
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login'); // pastikan kamu punya file resources/views/auth/login.blade.php
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', function () {
    return view('auth.register'); // file: resources/views/auth/register.blade.php
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); // halaman setelah login
})->name('dashboard');

// Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
// Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
