<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Kosan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        <h2 class="judul">Form Pendataan Inventaris Kosan</h2>
        <div class="user-bar">
    <span>Halo, {{ auth()->user()->name }}</span>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>

        @if (session('success'))
            <p style="color:green; margin-bottom:15px; text-align:center;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('inventaris.store') }}">
            @csrf

            <label>Nama Barang:</label>
            <input type="text" name="nama_barang">

            <label>Jumlah:</label>
            <input type="number" name="jumlah">

            <label>Kondisi:</label>
            <select name="kondisi">
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>

            <label>Keterangan:</label>
            <textarea name="keterangan" rows="4"></textarea>

            <button type="submit">Simpan Data Inventaris</button>
        </form>
    </div>

    <div class="container">
        <h2 class="judul">Daftar Seluruh Inventaris Kosan</h2>

        <div class="table-container">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_barang }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->kondisi }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        <a href="{{ route('inventaris.edit', $row->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('inventaris.destroy', $row->id) }}" method="POST"
                              onsubmit="return confirm('Yakin mau hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>