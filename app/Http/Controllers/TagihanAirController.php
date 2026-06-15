<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TagihanAirController extends Controller
{
    public function index()
    {
        $tagihanair = DB::table('tagihan_air')
            ->orderBy('ID')
            ->get();

        return view('tagihanair.index', compact('tagihanair'));
    }

    public function create()
    {
        return view('tagihanair.create');
    }

    public function store(Request $request) {
        
    $request->validate([
        'NoMeteran' => 'required|integer',
        'MeterAwal' => 'required|integer',
        'MeterAkhir' => [
            'required',
            'integer',
            function ($attribute, $value, $fail) use ($request) {
                $meterAwal = $request->input('MeterAwal');
                if (is_numeric($meterAwal) && $value < ($meterAwal + 20)) {
                    $fail('Meter akhir harus lebih besar minimal 20 dari meter awal.');
                }
            },
        ],
    ]);

        DB::table('tagihan_air')->insert([
            'NoMeteran' => $request->NoMeteran,
            'MeterAwal' => $request->MeterAwal,
            'MeterAkhir' => $request->MeterAkhir
        ]);

        return redirect()->route('tagihanair.index');
    }
}
