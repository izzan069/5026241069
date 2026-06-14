@extends('template')
@section('title', 'Edit Nilai Kuliah')
@section('konten')

    <h2>Edit Data Nilai Kuliah</h2>
    <form action="{{ route('nilaikuliah.update', $nilaikuliah->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>NRP</label><br>
            <input type="text" name="NRP" maxlength="6" value="{{ $nilaikuliah->NRP }}" required>
        </p>

        <p>
            <label>Nilai Angka</label><br>
            <input type="number" name="NilaiAngka" value="{{ $nilaikuliah->NilaiAngka }}" required>
        </p>

        <p>
            <label>SKS</label><br>
            <input type="number" name="SKS" value="{{ $nilaikuliah->SKS }}" required>
        </p>

        <button type="submit" class="btn btn-success">
            Update
        </button>

        <a href="{{ route('nilaikuliah.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
