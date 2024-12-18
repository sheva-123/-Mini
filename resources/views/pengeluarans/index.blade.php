<x-app-layout>

    <div class="container">
        <h1>Pengeluaran</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('pengeluarans.index') }}" method="GET" class="mb-4">
            <input type="text" name="cari" value="{{ $cari }}" class="form-control"
                placeholder="Cari Jenis Pengeluaran">
            <button type="submit" class="btn btn-primary mt-2">Cari</button>
        </form>

        <a href="{{ route('pengeluarans.create') }}" class="btn btn-success mb-3">Tambah Pengeluaran</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pertanian</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Jenis Pengeluaran</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $pengeluaran->pertanian->nama }}</td>
                        <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                        <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                        <td>{{ $pengeluaran->biaya }}</td>
                        <td>
                            <a href="{{ route('pengeluarans.edit', $pengeluaran) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pengeluarans.destroy', $pengeluaran) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
