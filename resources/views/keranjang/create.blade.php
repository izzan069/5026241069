@extends('template')
@section('title', 'Tambah Belanja')
@section('konten')

    <h2>Tambah Item Belanja</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('keranjang.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>Kode Barang</label><br>
            <input type="text" name="KodeBarang" id="KodeBarang" value="{{ old('KodeBarang') }}">
        </p>

        <p>
            <label>Jumlah Pembelian</label><br>
            <input type="text" name="Jumlah" id="Jumlah" value="{{ old('Jumlah') }}">
        </p>

        <p>
            <label>Harga per item</label><br>
            <input type="text" name="Harga" id="Harga" value="{{ old('Harga') }}">
        </p>

        <button type="submit" class="btn btn-primary">Beli</button>
        <a href="{{ route('keranjang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let kodeBarang = document.getElementById('KodeBarang').value.trim();
            let jumlah = document.getElementById('Jumlah').value.trim();
            let harga = document.getElementById('Harga').value.trim();

            if (kodeBarang === '') {
                alert('Kode Barang wajib diisi');
                return false;
            }
            if (isNaN(kodeBarang)) {
                alert('Kode Barang harus berupa angka');
                return false;
            }
            if (jumlah === '') {
                alert('Jumlah wajib diisi');
                return false;
            }
            if (isNaN(jumlah) || parseInt(jumlah) < 1) {
                alert('Jumlah harus berupa angka dan minimal 1');
                return false;
            }
            if (harga === '') {
                alert('Harga wajib diisi');
                return false;
            }
            if (isNaN(harga) || parseInt(harga) < 0) {
                alert('Harga harus berupa angka dan tidak boleh negatif');
                return false;
            }
            return true;
        }
    </script>

@endsection
