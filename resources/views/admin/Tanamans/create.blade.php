<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Tambah Tanaman</h1>
                <p class="text-white text-sm mt-1">Admin | Tanaman</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-8 px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div id="loadingOverlay"
                class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-green-500"></div>
                    <p class="text-white mt-4 text-lg">Sedang menyimpan...</p>
                </div>
            </div>
            <form action="{{ route('tanamans.store') }}" method="POST" onsubmit="showLoading()">
                @csrf
                <div class="flex flex-col">
                    <label for="nama_tanaman" class="text-lg font-medium text-gray-700">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" id="nama_tanaman"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition"
                        placeholder="Masukkan nama tanaman" required>
                </div>
                <div class="flex flex-col">
                    <label for="umur_panen" class="text-lg font-medium text-gray-700">Umur Panen Tanaman</label>
                    <input type="number" name="umur_panen" id="umur_panen"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition"
                        placeholder="Masukkan Hari Umur Panen" required>
                </div>
                <div class="flex flex-col">
                    <label for="jenis" class="text-lg font-medium text-gray-700">Jenis</label>
                    <select name="jenis" id="jenis"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition"
                        required>
                        <option value="" disabled selected>Pilih jenis tanaman</option>
                        @foreach (\App\Models\Tanaman::getJenisOptions() as $jenis)
                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="deskripsi" class="text-lg font-medium text-gray-700">Deskripsi</label>
                    <textarea textarea rows="4"
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                        type="text" name="deskripsi" required> </textarea>
                </div>


                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                    Simpan
                </button>
                <a href="{{ route('tanamans.index') }}">
                    <button type="button"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                        Kembali
                    </button>
                </a>
            </form>
        </div>
    </div>

    <script>
        function showLoading() {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        }
    </script>
</x-app-layout>