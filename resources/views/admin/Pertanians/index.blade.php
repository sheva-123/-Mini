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
            <select id="filterLokasi"
                class="p-3 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-gray-500 appearance-none w-full">
                <option value="">Pilih Lokasi</option>
                @foreach ($pertanians->unique('lokasi_pertanian') as $pertanian)
                    <option value="{{ $pertanian->lokasi_pertanian }}">{{ $pertanian->lokasi_pertanian }}</option>
                @endforeach
            </select>
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
            ➕ Tambah Pertanian
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
                            <td class="px-6 py-4 tanaman">{{ $pertanian->tanamans->nama_tanaman }}</td>
                            <td class="px-6 py-4 flex justify-center gap-4">
                                <a href="{{ route('pertanians.show', $pertanian->id) }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    <svg fill="none" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title></title>
                                            <path
                                                d="M15,2A8,8,0,0,0,8.69,14.9l-6.4,6.4,1.41,1.41,6.4-6.4A8,8,0,1,0,15,2Zm0,14a6,6,0,1,1,6-6A6,6,0,0,1,15,16Z">
                                            </path>
                                            <rect height="2" width="2" x="14" y="6"></rect>
                                            <rect height="5" width="2" x="14" y="9"></rect>
                                        </g>
                                    </svg>
                                </a>
                                <a href="{{ route('pertanians.edit', $pertanian->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                    </svg>
                                </a>
                                <form action="{{ route('pertanians.destroy', $pertanian->id) }}" method="POST"
                                    onsubmit="showLoading()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="deleteRecord(event)">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                                stroke="#ff0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
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
