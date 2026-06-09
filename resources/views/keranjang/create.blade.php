<!DOCTYPE html>
<html>
<head>
    <title>Form Beli</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input { padding: 8px; width: 300px; margin-top: 4px; }
        .btn { background: #28a745; color: white; padding: 8px 20px; border: none; cursor: pointer; border-radius: 4px; margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Form Beli Barang</h2>

    <form action="/beli" method="POST">
        @csrf
        <label>Kode Barang:</label>
        <input type="number" name="KodeBarang" required>

        <label>Jumlah:</label>
        <input type="number" name="Jumlah" required>

        <label>Harga per Item:</label>
        <input type="number" name="Harga" required>

        <br>
        <button type="submit" class="btn">Simpan</button>
        <a href="/">Kembali</a>
    </form>
</body>
</html>
