@extends('template')
@section('title', 'Tambah Nilai Kuliah')
@section('konten')

    <h2>Tambah Data Nilai Kuliah</h2>
    <form action="{{ route('nilaikuliah.store') }}" method="POST">
        @csrf
        <p>
            <label>NRP</label><br>
            <input type="text" name="NRP" maxlength="6" required>
        </p>

        <p>
            <label>Nilai Angka</label><br>
            <input type="number" name="NilaiAngka" required>
        </p>

        <p>
            <label>SKS</label><br>
            <input type="number" name="SKS" required>
        </p>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('nilaikuliah.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
