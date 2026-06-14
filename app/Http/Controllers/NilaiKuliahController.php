<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiKuliahController extends Controller
{
    public function index()
    {
        $nilaikuliah = DB::table('nilaikuliah')
            ->orderBy('ID')
            ->get();

        return view('nilaikuliah.index', compact('nilaikuliah'));
    }

    public function create()
    {
        return view('nilaikuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NRP' => 'required|max:6',
            'NilaiAngka' => 'required|integer',
            'SKS' => 'required|integer'
        ]);

        DB::table('nilaikuliah')->insert([
            'NRP' => $request->NRP,
            'NilaiAngka' => $request->NilaiAngka,
            'SKS' => $request->SKS
        ]);

        return redirect()->route('nilaikuliah.index');
    }

    public function edit($id)
    {
        $nilaikuliah = DB::table('nilaikuliah')
            ->where('ID', $id)
            ->first();

        return view('nilaikuliah.edit', compact('nilaikuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NRP' => 'required|max:6',
            'NilaiAngka' => 'required|integer',
            'SKS' => 'required|integer'
        ]);

        DB::table('nilaikuliah')
            ->where('ID', $id)
            ->update([
                'NRP' => $request->NRP,
                'NilaiAngka' => $request->NilaiAngka,
                'SKS' => $request->SKS
            ]);

        return redirect()->route('nilaikuliah.index');
    }

    public function destroy($id)
    {
        DB::table('nilaikuliah')
            ->where('ID', $id)
            ->delete();

        return redirect()->route('nilaikuliah.index');
    }
}
