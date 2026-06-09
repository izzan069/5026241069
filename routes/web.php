<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController ;
use App\Http\Controllers\PegawaiController ;
use App\Http\Controllers\PegawaiDBController ;
use App\Http\Controllers\BlogController ;
use App\Http\Controllers\SiswaController;
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
Route::get('/siswa/{nrp}/edit', [SiswaController::class, 'edit1'])->name('siswa.edit');
Route::put('/siswa/{nrp}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nrp}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/', function () {
    $data = DB::table('keranjangbelanja')->get();
    return view('keranjang.index', ['data' => $data]);
});

Route::get('/beli', function () {
    return view('keranjang.create');
});

Route::post('/beli', function (Request $request) {
    DB::table('keranjangbelanja')->insert([
        'KodeBarang' => $request->KodeBarang,
        'Jumlah'     => $request->Jumlah,
        'Harga'      => $request->Harga,
    ]);
    return redirect('/');
});

Route::post('/batal/{id}', function ($id) {
    DB::table('keranjangbelanja')->where('id', $id)->delete();
    return redirect('/');
});

