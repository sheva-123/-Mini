<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Pertanian</h1>
        <a href="{{ route('pertanians.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pertanian</th>
                    <th>Lokasi</th>
                    <th>Luas Lahan</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertanians as $pertanian)
                    <tr>
                        <td>{{ $pertanian->id }}</td>
                        <td>{{ $pertanian->nama_pertanian }}</td>
                        <td>{{ $pertanian->lokasi_pertanian }}</td>
                        <td>{{ $pertanian->luas_lahan }} ha</td>
                        <td>{{ $pertanian->created_at }}</td>
                        <td>
                            <a href="{{ route('pertanians.edit', $pertanian->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
