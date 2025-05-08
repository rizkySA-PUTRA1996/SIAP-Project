<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Obat</title>
</head>
<body>
<div class="container">
    <h1>Daftar Kategori Obat</h1>
    <a href="{{ route('create.kategoriObatCreate') }}" class="btn btn-sm btn-primary">Tambah Data</a>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <!-- Tabel Data -->
    <table border="1">
        <thead>
            <tr>
                <th>Id Kategori</th>
                <th>Nama Kategori</th>
                <th>Dibuat</th>
                <th>Diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @isset($kategori)

            @forelse ($kategori as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>{{ $k->created_at }}</td>
                <td>{{ $k->updated_at }}</td>
                <td>
                    <a href="{{ route('apotik.edit', $k->id_kategori) }}" class="btn btn-sm btn-warning">edit</a>
                    <form action="{{ route('apotik.destroy', $k->id_kategori) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
                    </form>
                </td>
            </tr>
            </tr>
            @empty
            <tr>
                <td colspan="4">Belum ada data kategori obat.</td>
            </tr>
            @endforelse
            @endisset
        </tbody>
    </table>
</div>
</body>
</html>
