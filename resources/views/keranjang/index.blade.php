@extends('template')
@section('title', 'Keranjang Belanja')
@section('konten')

    <h2>Keranjang Belanja</h2>

    <a href="{{ route('keranjang.create') }}" class="btn btn-primary">Beli</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Pembelian</th>
            <th>Kode Barang</th>
            <th>Jumlah Pembelian</th>
            <th>Harga per item</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        @forelse($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->KodeBarang }}</td>
                <td>{{ $row->Jumlah }}</td>
                <td>Rp {{ number_format($row->Harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($row->Jumlah * $row->Harga, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('keranjang.destroy', $row->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin membatalkan item ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Batal</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data di keranjang belanja.</td>
            </tr>
        @endforelse
    </table>

@endsection
