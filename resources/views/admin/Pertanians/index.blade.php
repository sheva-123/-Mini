<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Pertanian</h1>
                <p class="text-white text-sm mt-1">Admin | Pertanian</p>
            </div>
        </div>
    </header>

    <form action="{{ route('pertanians.index') }}" method="GET">
        @csrf
        <div class="container mx-auto mt-4 pr-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
            <input type="text" id="search" placeholder="Cari pertanian..."
                class="p-2 border border-gray-300 rounded-md shadow-sm w-1/2" onkeyup="filterTable()">

            <select id="filterLokasi" onchange="filterTable()" class="p-2 border border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Lokasi</option>
                @foreach ($pertanians->unique('lokasi_pertanian') as $pertanian)
                    <option value="{{ $pertanian->lokasi_pertanian }}">{{ $pertanian->lokasi_pertanian }}</option>
                @endforeach
            </select>
            </div>

            <div class="flex items-center space-x-4">
            <a href="{{ route('pertanians.create') }}"
                class="inline-flex items-center bg-blue-600 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                Tambah
            </a>
            </div>
        </div>
    </form>

    <div class="container mx-auto mt-8 pr-3">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table id="pertanianTable" class="w-full text-md text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama pertanian</th>
                            <th class="px-6 py-3">Lokasi</th>
                            <th class="px-6 py-3">Luas lahan</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pertanians as $pertanian)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $pertanian->nama_pertanian }}</td>
                                <td class="px-6 py-4 lokasi">{{ $pertanian->lokasi_pertanian }}</td>
                                <td class="px-6 py-4 luas">{{ $pertanian->luas_lahan }}</td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('pertanians.edit', $pertanian->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700">✏️</a>
                                    <form action="{{ route('pertanians.destroy', $pertanian->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            let searchInput = document.getElementById("search").value.toLowerCase();
            let lokasiFilter = document.getElementById("filterLokasi").value.toLowerCase();
            let luasFilter = parseFloat(document.getElementById("filterLuas").value) || 0;
            let rows = document.querySelectorAll("#pertanianTable tbody tr");

            rows.forEach(row => {
                aa
                let text = row.textContent.toLowerCase();
                let lokasi = row.querySelector(".lokasi").textContent.toLowerCase();
                let luas = parseFloat(row.querySelector(".luas").textContent) || 0;

                let matchSearch = text.includes(searchInput);
                let matchLokasi = lokasiFilter === "" || lokasi.includes(lokasiFilter);
                let matchLuas = luas >= luasFilter;

                row.style.display = matchSearch && matchLokasi && matchLuas ? "" : "none";
            });
        }
    </script>
</x-app-layout>
