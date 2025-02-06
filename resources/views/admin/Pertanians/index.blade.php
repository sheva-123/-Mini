<x-app-layout>
    <header class="bg-gradient-to-r from-green-700 to-lime-500 py-6 px-8 shadow-lg rounded-lg mb-6 mt-4 mx-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold">Data Pertanian</h1>
                <p class="text-sm mt-1">Admin | Manajemen Pertanian</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex w-2/2 gap-3">
            <select id="filterLokasi" class="p-3 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 appearance-none w-full">
                <option value="">Pilih Lokasi</option>
                @foreach ($pertanians->unique('lokasi_pertanian') as $pertanian)
                    <option value="{{ $pertanian->lokasi_pertanian }}">{{ $pertanian->lokasi_pertanian }}</option>
                @endforeach
            </select>
            <!-- Dropdown icon -->
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                <i class="fas fa-chevron-down"></i>
            </span>
            <form action="{{ route('pertanians.index') }}" method="GET" class="flex gap-2 w-full">
                <input type="text" name="search" placeholder="🔍 Cari pertanian..."
                value="{{ request()->get('search') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </form>
        </div>
        <a href="{{ route('pertanians.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-800 transition-all duration-300 flex items-center gap-2" onclick="showLoading()">
            ➕ Tambah Pertanian
        </a>
    </div>

    <div class="container mx-auto mt-8 px-6">
        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div id="loadingOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-green-500"></div>
                    <p class="text-white mt-4 text-lg">Sedang memproses...</p>
                </div>
            </div>
            <table id="pertanianTable" class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead class="text-md text-gray-900 uppercase bg-green-100 border-b">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Pertanian</th>
                        <th class="px-6 py-3">Lokasi</th>
                        <th class="px-6 py-3">Luas Lahan</th>
                        <th class="px-6 py-3">Tanaman</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pertanians as $pertanian)
                        <tr class="border-b hover:bg-green-50 transition-all">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $pertanian->nama_pertanian }}</td>
                            <td class="px-6 py-4 lokasi">{{ $pertanian->lokasi_pertanian }}</td>
                            <td class="px-6 py-4 luas">{{ $pertanian->luas_lahan }}</td>
                            <td class="px-6 py-4 tanaman">{{ $pertanian->tanaman_id }}</td>
                            <td class="px-6 py-4 flex justify-center gap-4">
                                <a href="{{ route('pertanians.edit', $pertanian->id) }}" class="text-yellow-500 hover:text-yellow-700 text-lg">✏️</a>
                                <form action="{{ route('pertanians.destroy', $pertanian->id) }}" method="POST" onsubmit="showLoading()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-lg" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterTable() {
            let searchInput = document.getElementById("search").value.toLowerCase();
            let lokasiFilter = document.getElementById("filterLokasi").value.toLowerCase();
            let rows = document.querySelectorAll("#pertanianTable tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                let lokasi = row.querySelector(".lokasi").textContent.toLowerCase();
                let matchSearch = text.includes(searchInput);
                let matchLokasi = lokasiFilter === "" || lokasi.includes(lokasiFilter);
                row.style.display = matchSearch && matchLokasi ? "" : "none";
            });
        }

        function showLoading() {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        }
    </script>
</x-app-layout>
