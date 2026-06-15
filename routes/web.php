<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController ;
use App\Http\Controllers\PegawaiController ;
use App\Http\Controllers\PegawaiDBController ;
use App\Http\Controllers\BlogController ;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\NilaiKuliahController;
use App\Http\Controllers\KertasHVSController;
use App\Http\Controllers\TagihanAirController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
	return "<h1>Halo, Selamat datang</h1> di tutorial laravel <i>www.malasngoding.com</i>";
});
Route::get('blog', function () {
    return view('blog');
});

Route::get('pert1', function () {
    return view('pertemuan1');
});

Route::get('pert2', function () {
    return view('pertemuan2');
});

Route::get('pert3', function () {
    return view('pertemuan3');
});

Route::get('pert4', function () {
    return view('pertemuan4');
});

Route::get('pert5', function () {
    return view('pertemuan5');
});


Route::get('dosen', [DosenController::class, 'index']);
Route::get('biodata', [DosenController::class, 'biodata']);

Route::get('/pegawainama/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
//blog
Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);
//DBcont
Route::get('/pegawai', [PegawaiDBController::class, 'index']);
Route::get('/pegawaitambah', [PegawaiDBController::class, 'tambah']);
Route::post('/pegawaistore', [PegawaiDBController::class, 'store']);
Route::get('/pegawaiedit/{id}', [PegawaiDBController::class, 'edit']);
Route::post('/pegawaiupdate', [PegawaiDBController::class, 'update']);
Route::get('/pegawaihapus/{id}', [PegawaiDBController::class, 'hapus']);
Route::get('/pegawaicari', [PegawaiDBController::class, 'cari']);
//route CRUD siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{nrp}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nrp}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nrp}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// route CRUD keranjang belanja
Route::get('/keranjangbelanja', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::get('/keranjangbelanja/beli', [KeranjangController::class, 'create'])->name('keranjang.create');
Route::post('/keranjangbelanja', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::delete('/keranjangbelanja/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

//nilaikuliah
Route::get('/nilaikuliah', [NilaiKuliahController::class, 'index'])->name('nilaikuliah.index');
Route::get('/nilaikuliah/create', [NilaiKuliahController::class, 'create'])->name('nilaikuliah.create');
Route::post('/nilaikuliah', [NilaiKuliahController::class, 'store'])->name('nilaikuliah.store');
Route::get('/nilaikuliah/{id}/edit', [NilaiKuliahController::class, 'edit'])->name('nilaikuliah.edit');
Route::put('/nilaikuliah/{id}', [NilaiKuliahController::class, 'update'])->name('nilaikuliah.update');
Route::delete('/nilaikuliah/{id}', [NilaiKuliahController::class, 'destroy'])->name('nilaikuliah.destroy');

// route CRUD kertas HVS
Route::get('/kertashvs', [KertasHVSController::class, 'index'])->name('kertashvs.index');
Route::get('/kertashvs/create', [KertasHVSController::class, 'create'])->name('kertashvs.create');
Route::post('/kertashvs', [KertasHVSController::class, 'store'])->name('kertashvs.store');
Route::get('/kertashvs/{id}/edit', [KertasHVSController::class, 'edit'])->name('kertashvs.edit');
Route::put('/kertashvs/{id}', [KertasHVSController::class, 'update'])->name('kertashvs.update');
Route::delete('/kertashvs/{id}', [KertasHVSController::class, 'destroy'])->name('kertashvs.destroy');

Route::get('/eas', [TagihanAirController::class, 'index'])->name('tagihanair.index');
Route::get('/eas/create', [TagihanAirController::class, 'create'])->name('tagihanair.create');
Route::post('/eas', [TagihanAirController::class, 'store'])->name('tagihanair.store');
