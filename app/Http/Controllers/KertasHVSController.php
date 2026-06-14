<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KertasHVSController extends Controller
{
    public function index()
    {
        $data = DB::table('kertashvs')->orderBy('kodekertashvs')->get();
        return view('kertashvs.index', compact('data'));
    }

    public function create()
    {
        return view('kertashvs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merkkertashvs' => 'required|string|max:30',
            'stockkertashvs' => 'required|integer|min:0',
            'tersedia' => 'required|in:Y,T',
        ]);

        DB::table('kertashvs')->insert([
            'merkkertashvs'  => $request->merkkertashvs,
            'stockkertashvs' => $request->stockkertashvs,
            'tersedia'       => $request->tersedia,
        ]);

        return redirect()->route('kertashvs.index')->with('success', 'Data kertas HVS berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = DB::table('kertashvs')->where('kodekertashvs', $id)->first();

        if (!$data) {
            abort(404);
        }

        return view('kertashvs.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merkkertashvs'  => 'required|string|max:30',
            'stockkertashvs' => 'required|integer|min:0',
            'tersedia'       => 'required|in:Y,T',
        ]);

        DB::table('kertashvs')
            ->where('kodekertashvs', $id)
            ->update([
                'merkkertashvs'  => $request->merkkertashvs,
                'stockkertashvs' => $request->stockkertashvs,
                'tersedia'       => $request->tersedia,
            ]);

        return redirect()->route('kertashvs.index')->with('success', 'Data kertas HVS berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table('kertashvs')->where('kodekertashvs', $id)->delete();
        return redirect()->route('kertashvs.index')->with('success', 'Data kertas HVS berhasil dihapus.');
    }
}
