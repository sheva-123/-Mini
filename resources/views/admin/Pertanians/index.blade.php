<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Pertanian</h1>
                <p class="text-white text-sm mt-1">Admin | Pertanian</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex w-2/2 gap-3">
            <form action="{{ route('pertanians.index') }}" method="get">
                <select name="filter" id="filterLokasi"
                    class="p-3 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-gray-500 appearance-none w-full"
                    onchange="this.form.submit()">
                    <option value="">Semua Lokasi</option>
                    @foreach ($dataFilter->unique('lokasi_pertanian') as $pertanian)
                    <option value="{{ $pertanian->lokasi_pertanian }}">{{ $pertanian->lokasi_pertanian }}</option>
                    @endforeach
                </select>
            </form>
            <!-- Dropdown icon -->
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                <i class="fas fa-chevron-down"></i>
            </span>
            <div class="flex border-1 border-gray-200 rounded-md focus-within:ring-2 ring-gray-500">
                <form action="{{ route('pertanians.index') }}" method="GET" class="flex gap-2 w-full">
                    <input type="text" name="search" placeholder=" Cari pertanian..."
                        value="{{ request()->get('search') }}"
                        class="w-[150px] p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-gray-500">
                    <button type="submit" class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                        <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
            </div>
            </form>
        </div>
        <a href="{{ route('pertanians.create') }}"
            class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-800 transition-all duration-300 flex items-center gap-2"
            onclick="showLoading()">
            Tambah
        </a>
    </div>

    <div class="container mx-auto mt-8 px-6">
        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div id="loadingOverlay"
                class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
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
                        <th class="px-6 py-3 text-center">Lokasi</th>
                        <th class="px-6 py-3 text-center">Luas Lahan</th>
                        <th class="px-6 py-3 text-center">Tanaman</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pertanians as $pertanian)
                    <tr class="border-b hover:bg-green-50 transition-all">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $pertanian->nama_pertanian }}</td>
                        <td class="px-6 py-4 text-center">{{ $pertanian->lokasi_pertanian }}</td>
                        <td class="px-6 py-4 text-center">{{ $pertanian->luas_lahan }}</td>
                        <td class="px-6 py-4 text-center">{{ $pertanian->tanaman->nama_tanaman }}</td>
                        <td class="px-6 py-4 flex justify-center gap-4">
                            <a href="{{ route('pertanians.show', $pertanian->id) }}"
                                class="text-yellow-500 hover:text-yellow-700">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('pertanians.edit', $pertanian->id) }}"
                                class="text-yellow-500 hover:text-yellow-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pertanians.destroy', $pertanian->id) }}" method="POST"
                                onsubmit="showLoading()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                    onclick="deleteRecord(event)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($pertanians->isEmpty())
            <div class="text-center py-6">
                <p class="text-gray-500">Tidak ada data yang tersedia.</p>
            </div>
            @endif
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