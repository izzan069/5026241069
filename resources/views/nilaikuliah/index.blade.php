@extends('template')
@section('title', 'Data Nilai Kuliah')
@section('konten')

    <h2>Data Nilai Kuliah</h2>
    <a href="{{ route('nilaikuliah.create') }}" class="btn btn-primary">
        Tambah Data
    </a>
    <br><br>
    <table class="table table-striped table-hover">

        <tr>
            <th>ID</th>
            <th>NRP</th>
            <th>Nilai Angka</th>
            <th>SKS</th>
            <th>Nilai Huruf</th>
            <th>Bobot</th>
            <th>Aksi</th>
        </tr>

        @foreach ($nilaikuliah as $n)
            <tr>
                <td>{{ $n->ID }}</td>
                <td>{{ $n->NRP }}</td>
                <td>{{ $n->NilaiAngka }}</td>
                <td>{{ $n->SKS }}</td>

                <td>
                    @if ($n->NilaiAngka <= 40)
                        D
                    @elseif ($n->NilaiAngka <= 60)
                        C
                    @elseif ($n->NilaiAngka <= 80)
                        B
                    @else
                        A
                    @endif
                </td>

                <td>
                    {{ $n->NilaiAngka * $n->SKS }}
                </td>

                <td>
                    <a href="{{ route('nilaikuliah.edit', $n->ID) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('nilaikuliah.destroy', $n->ID) }}" method="POST" style="display:inline;">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
