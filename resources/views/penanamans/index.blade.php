<!-- resources/views/penanamen/index.blade.php -->
{{-- <x-layouts.app> --}}
<x-app-layout>

    <x-slot name="title">Daftar Penanaman</x-slot>

    <div class="container">
        <h1>Daftar Penanaman</h1>
        <a href="{{ route('Penanamans.create') }}" class="btn btn-primary mb-3">Tambah Penanaman</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pertanian</th>
                    <th>Tanaman</th>
                    <th>Tanggal Tanam</th>
                    <th>Jumlah Tanaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penanaman as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->pertanian->nama_pertanian }}</td>
                        <td>{{ $item->tanaman->nama_tanaman }}</td>
                        <td>{{ $item->tanggal_tanam }}</td>
                        <td>{{ $item->jumlah_tanaman }}</td>
                        <td>
                            <a href="{{ route('Penanamans.edit', $item) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('Penanamans.destroy', $item) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
{{-- </x-layouts.app> --}}
