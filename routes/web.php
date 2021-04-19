<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

// Route Mahasiswa
Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('IndexMahasiswa');
    Route::get('/insert', [MahasiswaController::class, 'show'])->name('TambahMahasiswa');
    Route::post('/insert', [MahasiswaController::class, 'store']);
    Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('EditMahasiswa');
    Route::post('/update', [MahasiswaController::class, 'update']);
    Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('DeleteMahasiswa');
});
// Route Dosen
Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('IndexDosen');
    Route::get('/insert', [DosenController::class, 'create'])->name('TambahDosen');
    Route::post('/insert', [DosenController::class, 'store']);
    Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('EditDosen');
    Route::post('/update', [DosenController::class, 'update']);
    Route::get('/delete/{id}', [DosenController::class, 'destroy'])->name('DeleteDosen');
});
// Route Prodi
Route::prefix('prodi')->group(function () {
    Route::get('/', [ProdiController::class, 'index'])->name('IndexProdi');
    Route::get('/insert', [ProdiController::class, 'create'])->name('TambahProdi');
    Route::post('/insert', [ProdiController::class, 'store']);
    Route::get('/edit/{id}', [ProdiController::class, 'edit'])->name('EditProdi');
    Route::post('/update', [ProdiController::class, 'update']);
    Route::get('/delete/{id}', [ProdiController::class, 'destroy'])->name('DeleteProdi');
});
// Route Mata Kuliah
Route::prefix('matkul')->group(function () {
    Route::get('/', [MatkulController::class, 'index'])->name('IndexMatkul');
    Route::get('/insert', [MatkulController::class, 'create'])->name('TambahMatkul');
    Route::post('/insert', [MatkulController::class, 'store']);
    Route::get('/edit/{id}', [MatkulController::class, 'edit'])->name('EditMatkul');
    Route::post('/update/{id}', [MatkulController::class, 'update'])->name('makul.update');
    Route::get('/delete/{id}', [MatkulController::class, 'destroy'])->name('DeleteMatkul');
});
// Route Jadwal
Route::prefix('jadwal')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('IndexJadwal');
    Route::get('/insert', [JadwalController::class, 'create'])->name('TambahJadwal');
    Route::post('/insert', [JadwalController::class, 'store']);
    Route::get('/edit/{id}', [JadwalController::class, 'edit'])->name('EditJadwal');
    Route::post('/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('/delete/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
});
// Route Profil
Route::prefix('pengaturan')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('PengaturanProfil');
});

// Route::get('/coba', function () {
//     $testString = '01.23456789';
//     // 56789
//     $test = Str::substr($testString, -8);
//     return number_format((float)$testString, 2, '.', '');
// });