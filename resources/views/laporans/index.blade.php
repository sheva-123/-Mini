<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Laporan</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('laporans.index') }}" method="GET" class="mb-4 flex justify-between items-center">
            <div class="flex-1">
                <input type="text" name="cari" value="{{ request('cari') }}"
                       class="form-input w-full border border-gray-300 rounded p-2"
                       placeholder="Cari Tanggal Laporan">
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-600">
                Cari
            </button>
        </form>

        <!-- Tombol Tambah Laporan -->
        <a href="{{ route('laporans.create') }}">Tambah Laporan</a>

        <!-- Tabel Data Laporan -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-gray-700">Pertanian ID</th>
                        <th class="px-4 py-2 border-b text-gray-700">Tanggal Laporan</th>
                        <th class="px-4 py-2 border-b text-gray-700">Deskripsi</th>
                        <th class="px-4 py-2 border-b text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporans as $laporan)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $laporan->pertanian_id }}</td>
                            <td class="px-4 py-2">{{ $laporan->tanggal_laporan }}</td>
                            <td class="px-4 py-2">{{ $laporan->deskripsi }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('laporans.edit', $laporan) }}"
                                   class="btn btn-warning bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('laporans.destroy', $laporan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $laporans->links() }}
        </div>
    </div>
</x-app-layout>
