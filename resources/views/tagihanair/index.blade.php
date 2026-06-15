@extends('template')
@section('title', 'Kode Soal tagihan_air')
@section('konten')

    <h2>Data Tagihan Air</h2>
    <a href="{{ route('tagihanair.create') }}" class="btn btn-primary">
        Input Tagihan Baru
    </a>
    <br><br>
    <table class="table table-striped table-hover">

        <tr>
            <th>ID</th>
            <th>No Meteran</th>
            <th>Penggunaan</th>
            <th>Total Tagihan</th>
        </tr>

        @foreach ($tagihanair as $n)
            <tr>
                <td>{{ $n->ID }}</td>
                <td>{{ $n->NoMeteran }}</td>
                <td>{{ $n->MeterAkhir - $n->MeterAwal }}</td>
                <td>Rp {{ number_format(($n->MeterAkhir - $n->MeterAwal) * 5000, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>
@endsection
