<x-app-layout>

    <div class="container">
        <h1>Daftar Pemeliharaans</h1>
        <a href="{{ route('pemeliharaans.create') }}" class="btn btn-primary mb-3">Tambah Pemeliharaans</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penanaman</th>
                    <th>Tanggal Pemeliharaan</th>
                    <th>Jenis Pemeliharaan</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemeliharaans as $pemeliharaans)
                <tr>
                    <td>{{ $pemeliharaans->id }}</td>
                    <td>{{ $pemeliharaans->penanaman->nama ?? 'Tidak diketahui' }}</td>
                    <td>{{ $pemeliharaans->tanggal_pemeliharaan }}</td>
                    <td>{{ $pemeliharaans->jenis_pemeliharaan }}</td>
                    <td>{{ $pemeliharaans->biaya }}</td>
                    <td>
                        <a href="{{ route('pemeliharaans.edit', $pemeliharaans) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pemeliharaans.destroy', $pemeliharaans) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

