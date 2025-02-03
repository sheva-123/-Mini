<x-app-layout>
    <header class="bg-gradient-to-r from-green-700 to-lime-500 py-6 px-8 shadow-lg rounded-lg mb-6 mt-4 mx-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold">🌿 Data Tanaman</h1>
                <p class="text-sm mt-1">Admin | Manajemen Tanaman</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex w-2/3 gap-4">
            <select id="filterType" class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
                <option value="all">Semua</option>
                <option value="herbal">Herbal</option>
                <option value="buah">Buah</option>
                <option value="sayur">Sayur</option>
            </select>
            <input type="text" name="search" id="search" placeholder="🔍 Cari tanaman..." class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500" onkeyup="filterTable()">
        </div>
        <a href="{{ route('tanamans.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-800 transition-all duration-300 flex items-center gap-2">
            ➕ Tambah Tanaman
        </a>
    </div>

    <div class="container mx-auto mt-8 px-6">
        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div id="successMessage" class="hidden bg-green-500 text-white p-3 rounded-lg text-center mb-4">Data berhasil ditambahkan!</div>
            <div id="loadingOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-green-500"></div>
                    <p class="text-white mt-4 text-lg">Sedang memproses...</p>
                </div>
            </div>
            <table id="tanamanTable" class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead class="text-md text-gray-900 uppercase bg-green-100 border-b">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Tanaman</th>
                        <th class="px-6 py-3">Jenis</th>
                        <th class="px-6 py-3">Deskripsi</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanamans as $tanaman)
                        <tr class="border-b hover:bg-green-50 transition-all">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $tanaman->nama_tanaman }}</td>
                            <td class="px-6 py-4">{{ $tanaman->jenis }}</td>
                            <td class="px-6 py-4">{{ $tanaman->deskripsi }}</td>
                            <td class="px-6 py-4 flex justify-center gap-4">
                                <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="text-yellow-500 hover:text-yellow-700 text-lg">✏️</a>
                                <form action="{{ route('tanamans.destroy', $tanaman->id) }}" method="POST" onsubmit="showLoading()">
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
            let filterType = document.getElementById("filterType").value.toLowerCase();
            let rows = document.querySelectorAll("#tanamanTable tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                let matchSearch = text.includes(searchInput);
                let matchType = filterType === "all" || text.includes(filterType);
                row.style.display = matchSearch && matchType ? "" : "none";
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            let successMessage = document.getElementById("successMessage");
            if (window.location.search.includes("success=true")) {
                successMessage.classList.remove("hidden");
                successMessage.classList.add("animate-bounce");
                setTimeout(() => {
                    successMessage.classList.add("hidden");
                }, 3000);
            }
        });

        function showLoading() {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        }

        document.querySelector("a[href='{{ route('tanamans.create') }}']").addEventListener("click", showLoading);
        document.querySelector("form[action='{{ route('tanamans.store') }}']").addEventListener("submit", showLoading);
    </script>
</x-app-layout>
