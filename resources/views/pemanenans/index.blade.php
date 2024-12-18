<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Selamat Datang
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">

        <h1 class="text-2xl font-bold mb-4">Pemanenan</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('pemanenans.index') }}" method="GET" class="mb-4 flex justify-between items-center">
            <div class="flex-1">
                <input type="text" name="cari" value="{{ $cari }}" class="form-input w-full"
                    placeholder="Cari Tanggal Panen">
            </div>
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
        </form>

        <!-- Tombol Tambah Pemanenan -->
        <a href="{{ route('pemanenans.create') }}" class="btn btn-success mb-4 inline-block">Tambah Pemanenan</a>

        <!-- Tabel Data Pemanenan -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-gray-700">Penanaman</th>
                        <th class="px-4 py-2 border-b text-gray-700">Tanggal Panen</th>
                        <th class="px-4 py-2 border-b text-gray-700">Jumlah Hasil</th>
                        <th class="px-4 py-2 border-b text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemanenans as $pemanenan)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $pemanenan->penanaman->nama }}</td>
                            <td class="px-4 py-2">{{ $pemanenan->tanggal_pemanenan }}</td>
                            <td class="px-4 py-2">{{ $pemanenan->jumlah_hasil }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('pemanenans.edit', $pemanenan) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pemanenans.destroy', $pemanenan) }}" method="POST"
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
    </div>

</x-app-layout>
