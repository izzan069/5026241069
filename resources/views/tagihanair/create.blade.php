@extends('template')
@section('title', 'Kode Soal tagihan_air')
@section('konten')

    <h2>Input Tagihan Air</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('tagihanair.store') }}" method="POST">
        @csrf
        <p>
            <label>No Meteran</label><br>
            <input type="number" name="NoMeteran" required>
        </p>

        <p>
            <label>Meter Awal</label><br>
            <input type="number" name="MeterAwal" required>
        </p>

        <p>
            <label>Meter Akhir</label><br>
            <input type="number" name="MeterAkhir" required>
        </p>

        <button type="submit" class="btn btn-primary">
            Tambah
        </button>

        <a href="{{ route('tagihanair.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
