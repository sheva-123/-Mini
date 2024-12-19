<x-app-layout>
    <x-slot name="title">Laporan</x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">📊 Laporan Pertanian</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('laporans.index') }}" method="GET" class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
            <div class="flex-1 mr-2">
                <input type="text" name="cari" value="{{ request('cari') }}"
                       class="form-input w-full border border-gray-300 rounded-lg p-2"
                       placeholder="Cari Tanggal Laporan">
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                Cari
            </button>
        </form>

        <!-- Tombol Tambah Laporan -->
        <a href="{{ route('laporans.create') }}" class="inline-block mb-4 bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
            Tambah Laporan
        </a>

        <!-- Tabel Data Laporan -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-gray-700">No</th>
                        <th class="px-6 py-4 text-gray-700">Tanggal Laporan</th>
                        <th class="px-6 py-4 text-gray-700">Deskripsi</th>
                        <th class="px-6 py-4 text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporans as $laporan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $laporan->tanggal_laporan }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $laporan->deskripsi }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-start items-center space-x-3">
                                    <a href="{{ route('laporans.edit', $laporan) }}"
                                       class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg transition duration-200">
                                        Edit
                                    </a>
                                    <form action="{{ route('laporans.destroy', $laporan) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition duration-200">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
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
        <div class="mt-6">
            {{ $laporans->links() }}
        </div>
    </div>
</x-app-layout>
