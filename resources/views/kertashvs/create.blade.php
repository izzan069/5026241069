@extends('template')
@section('title', 'Tambah Kertas HVS')
@section('konten')

    <h2>Tambah Data Kertas HVS</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('kertashvs.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>Merk Kertas HVS</label><br>
            <input type="text" name="merkkertashvs" id="merkkertashvs" maxlength="30" value="{{ old('merkkertashvs') }}">
        </p>

        <p>
            <label>Stock</label><br>
            <input type="text" name="stockkertashvs" id="stockkertashvs" value="{{ old('stockkertashvs') }}">
        </p>

        <p>
            <label>Tersedia</label><br>
            <select name="tersedia" id="tersedia">
                <option value="">-- Pilih --</option>
                <option value="Y" {{ old('tersedia') == 'Y' ? 'selected' : '' }}>Ya</option>
                <option value="T" {{ old('tersedia') == 'T' ? 'selected' : '' }}>Tidak</option>
            </select>
        </p>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kertashvs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let merk = document.getElementById('merkkertashvs').value.trim();
            let stock = document.getElementById('stockkertashvs').value.trim();
            let tersedia = document.getElementById('tersedia').value;

            if (merk === '') {
                alert('Merk Kertas HVS wajib diisi');
                return false;
            }
            if (merk.length > 30) {
                alert('Merk Kertas HVS maksimal 30 karakter');
                return false;
            }
            if (stock === '') {
                alert('Stock wajib diisi');
                return false;
            }
            if (isNaN(stock) || parseInt(stock) < 0) {
                alert('Stock harus berupa angka dan tidak boleh negatif');
                return false;
            }
            if (tersedia === '') {
                alert('Tersedia wajib dipilih');
                return false;
            }
            return true;
        }
    </script>

@endsection
