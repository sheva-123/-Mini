<x-app-layout>
    <div class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-2xl">
            <form action="{{ route('tanamans.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Tanaman -->
                <div class="flex flex-col">
                    <label for="nama_tanaman" class="text-lg font-medium text-gray-700">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" id="nama_tanaman" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" required placeholder="Masukkan nama tanaman">
                </div>

                <!-- Jenis Tanaman -->
                <div class="flex flex-col">
                    <label for="jenis" class="text-lg font-medium text-gray-700">Jenis Tanaman</label>
                    <input type="text" name="jenis" id="jenis" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" required placeholder="Masukkan jenis tanaman">
                </div>

                <!-- Deskripsi Tanaman -->
                <div class="flex flex-col">
                    <label for="deskripsi" class="text-lg font-medium text-gray-700">Deskripsi Tanaman</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" placeholder="Masukkan deskripsi tanaman"></textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="text-center mt-8">
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                        Simpan Data
                    </button>
                </div>
            </form>

            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="{{ route('tanamans.index') }}"
                   class="inline-block w-full py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition-transform transform hover:scale-105">
                    Kembali
                </a>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
