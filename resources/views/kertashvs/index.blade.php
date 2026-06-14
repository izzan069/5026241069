@extends('template')
@section('title', 'Data Kertas HVS')
@section('konten')

    <h2>Data Kertas HVS</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('kertashvs.create') }}" class="btn btn-primary">Tambah Data</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Kertas HVS</th>
            <th>Merk Kertas HVS</th>
            <th>Stock</th>
            <th>Tersedia</th>
            <th>Aksi</th>
        </tr>

        @forelse($data as $row)
            <tr>
                <td>{{ $row->kodekertashvs }}</td>
                <td>{{ $row->merkkertashvs }}</td>
                <td>{{ $row->stockkertashvs }}</td>
                <td>{{ $row->tersedia == 'Y' ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('kertashvs.edit', $row->kodekertashvs) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('kertashvs.destroy', $row->kodekertashvs) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data kertas HVS.</td>
            </tr>
        @endforelse
    </table>

@endsection
