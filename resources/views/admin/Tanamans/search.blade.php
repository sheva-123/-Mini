<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Hasil Pencarian Tanaman</h1>
                <p class="text-white text-sm mt-1">Admin | Tanaman</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-4 pr-3 flex justify-between items-center">
        <form action="{{ route('tanamans.search') }}" method="GET">
            @csrf
            <input type="text" name="search" id="search" placeholder="Cari tanaman..."
                class="p-2 border border-gray-300 rounded-md shadow-sm w-1/3" value="{{ request()->input('search') }}">

            <!-- Filter Jenis Tanaman -->
            <select name="jenis" class="p-2 border border-gray-300 rounded-md shadow-sm ml-2 w-1/4">
                <option value="">Pilih Jenis Tanaman</option>
                @foreach ($jenisTanaman as $jenis)
                    <option value="{{ $jenis }}" {{ request()->jenis == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>

            <!-- Filter Lokasi Tanaman -->
            <select name="lokasi" class="p-2 border border-gray-300 rounded-md shadow-sm ml-2 w-1/4">
                <option value="">Pilih Lokasi</option>
                @foreach ($lokasiTanaman as $lokasi)
                    <option value="{{ $lokasi }}" {{ request()->lokasi == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg ml-2">Cari</button>
        </form>
    </div>

    @if($tanamans->isNotEmpty())
        <div class="container mx-auto mt-8 pr-3">
            <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <table class="w-full text-md text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Tanaman</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3">Deskripsi</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanamans as $tanaman)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $tanaman->nama_tanaman }}</td>
                                <td class="px-6 py-4">{{ $tanaman->jenis }}</td>
                                <td class="px-6 py-4">{{ $tanaman->deskripsi }}</td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="text-yellow-500 hover:text-yellow-700">✏️</a>
                                    <form action="{{ route('tanamans.destroy', $tanaman->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="container mx-auto mt-8 pr-3">
            <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200 text-center">
                <p class="text-gray-500">Tidak ada tanaman yang ditemukan untuk pencarian ini.</p>
            </div>
        </div>
    @endif
</x-app-layout>
