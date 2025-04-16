<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');
Route::get('/admin/dosen', function () {
    return view('admin.dosen');
})->name('admin.dosen');
Route::get('/admin/mahasiswa', function () {
    return view('admin.mahasiswa');
})->name('admin.mahasiswa');
Route::get('/admin/matkul', function () {
    return view('admin.matkul');
})->name('admin.matkul');
Route::get('/admin/prodi', function () {
    return view('admin.prodi');
})->name('admin.prodi');
Route::get('/admin/penilaian', function () {
    return view('admin.penilaian');
})->name('admin.penilaian');
Route::get('/admin/rekap', function () {
    return view('admin.rekap');
})->name('admin.rekap');

Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
})->name('mahasiswa.index');
Route::get('/mahasiswa/penilaian', function () {
    return view('mahasiswa.isi_penilaian');
})->name('mahasiswa.isi_penilaian');
Route::get('/mahasiswa/riwayat', function () {
    return view('mahasiswa.riwayat_penilaian');
})->name('mahasiswa.riwayat_penilaian');

Route::get('/dosen', function () {
    return view('dosen.index');
})->name('dosen.index');
Route::get('/dosen/hasil_penilaian', function () {
    return view('dosen.hasil_penilaian');
})->name('dosen.hasil_penilaian');

Route::get('/penilaian', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('login');
});

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
