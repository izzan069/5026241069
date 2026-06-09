<?php

namespace App\Http\Controllers;

use App\Models\Keranjangbelanja;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Halaman Index
    public function index()
    {
        $data = Keranjangbelanja::all();
        return view('keranjang.index', compact('data'));
    }

    // Halaman Form Tambah (tombol Beli)
    public function create()
    {
        return view('keranjang.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        Keranjangbelanja::create([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah'     => $request->Jumlah,
            'Harga'      => $request->Harga,
        ]);

        return redirect()->route('keranjang.index');
    }

    // Hapus data (tombol Batal)
    public function destroy($id)
    {
        Keranjangbelanja::findOrFail($id)->delete();
        return redirect()->route('keranjang.index');
    }
}
