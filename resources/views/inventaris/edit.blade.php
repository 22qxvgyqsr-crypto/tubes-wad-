<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventaris Kosan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Edit Data Inventaris Kosan</h2>

        <form action="{{ route('inventaris.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" required>
                @error('nama_barang') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Jumlah:</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $item->jumlah) }}" required>
                @error('jumlah') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Kondisi:</label>
                <select name="kondisi">
                    @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $k)
                        <option value="{{ $k }}" {{ old('kondisi', $item->kondisi) == $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan:</label>
                <textarea name="keterangan">{{ old('keterangan', $item->keterangan) }}</textarea>
            </div>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <p style="text-align:center; margin-top:15px;">
            <a href="{{ route('inventaris.index') }}">Kembali</a>
        </p>
    </div>
</body>
</html>