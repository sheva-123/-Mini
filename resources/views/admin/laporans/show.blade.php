<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Detail Laporan</h1>
        </div>
    </header>

    <div class="flex flex-wrap justify-between items-center gap-4">
        <form action="{{ route('admin.laporans.show', $id) }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
            <input type="text" name="search" placeholder="Cari..." class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('search') }}">
            <input type="date" name="tanggal_awal" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('tanggal_awal') }}">
            <input type="date" name="tanggal_akhir" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('tanggal_akhir') }}">
            <select name="sort" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                <option value="">Urutan Data</option>
                <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
            </select>
            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Filter</button>
        </form>
    </div>

    <div class="container mx-auto px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table class="w-full text-md text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Lahan</th>
                            <th scope="col" class="px-6 py-3">Laporan</th>
                            <th scope="col" class="px-6 py-3">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($laporan->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">Tidak ada data yang tersedia.</td>
                        </tr>
                        @else
                        @foreach ($laporan as $laporan)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $laporan->pertanian->nama_pertanian }}</td>
                            <td class="px-6 py-4">{{ $laporan->deskripsi }}</td>
                            <td class="px-6 py-4">{{ $laporan->tanggal_laporan }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Tombol kembali di bawah tabel, sisi kiri -->
            <div class="mt-4">
                <a href="{{ route('admin.laporans.index') }}">
                    <button type="button"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>


</x-app-layout>