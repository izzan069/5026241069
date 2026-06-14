<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $data = DB::table('keranjangbelanja')->get();
        return view('keranjang.index', compact('data'));
    }

    public function create()
    {
        return view('keranjang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'KodeBarang' => 'required|integer',
            'Jumlah'     => 'required|integer|min:1',
            'Harga'      => 'required|integer|min:0',
        ]);

        DB::table('keranjangbelanja')->insert([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah'     => $request->Jumlah,
            'Harga'      => $request->Harga,
        ]);

        return redirect()->route('keranjang.index');
    }

    public function destroy($id)
    {
        DB::table('keranjangbelanja')->where('id', $id)->delete();
        return redirect()->route('keranjang.index');
    }
}
