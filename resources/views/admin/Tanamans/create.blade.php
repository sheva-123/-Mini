<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Tambah Tanaman</h1>
                <p class="text-white text-sm mt-1">Admin | Tanaman</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-8 pr-3">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div id="loadingOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-green-500"></div>
                    <p class="text-white mt-4 text-lg">Sedang menyimpan...</p>
                </div>
            </div>
            <form action="{{ route('tanamans.store') }}" method="POST" onsubmit="showLoading()">
                @csrf
                <div class="mb-4">
                    <label for="nama_tanaman" class="block text-gray-700">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" id="nama_tanaman" class="p-2 border border-gray-300 rounded-md w-full" required>
                    @error('nama_tanaman')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="lokasi_pertanian" class="text-lg font-medium text-gray-700">Tanaman</label>
                    <select name="lokasi_pertanian" id="lokasi_pertanian"
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg" required>
                        <option value="" disabled selected>Pilih lokasi pertanian</option>
                        <option value="lokasi_1">Lokasi 1</option>
                        <option value="lokasi_2">Lokasi 2</option>
                        <option value="lokasi_3">Lokasi 3</option>
                        <option value="lokasi_4">Lokasi 4</option>
                    </select>
                </div>
                
                

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="p-2 border border-gray-300 rounded-md w-full"></textarea>
                    @error('deskripsi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function showLoading() {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        }
    </script>
</x-app-layout>
