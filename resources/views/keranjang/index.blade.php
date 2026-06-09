<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #4CAF50; color: white; }
        .btn-beli  { background: #007bff; color: white; padding: 6px 12px; border: none; cursor: pointer; border-radius: 4px; }
        .btn-batal { background: #dc3545; color: white; padding: 6px 12px; border: none; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Keranjang Belanja</h2>
    <a href="/beli"><button class="btn-beli">+ Beli</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>Kode Pembelian</th>
                <th>Kode Barang</th>
                <th>Jumlah Pembelian</th>
                <th>Harga per Item</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->KodeBarang }}</td>
                <td>{{ $item->Jumlah }}</td>
                <td>Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->Jumlah * $item->Harga, 0, ',', '.') }}</td>
                <td>
                    <form action="/batal/{{ $item->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-batal">Batal</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
