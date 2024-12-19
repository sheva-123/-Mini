<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-2xl">
            <h1 class="text-4xl font-extrabold text-green-700 text-center mb-4">✏️ Edit Data Pertanian</h1>
            <p class="text-center text-gray-600 mb-8">Perbarui informasi pertanian dengan mudah dan cepat</p>

            <form action="{{ route('pertanians.update', $pertanian->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label for="nama_pertanian" class="text-lg font-medium text-gray-700">Nama Pertanian</label>
                    <input type="text" name="nama_pertanian" id="nama_pertanian" value="{{ $pertanian->nama_pertanian }}" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           placeholder="Masukkan nama pertanian" required>
                </div>

                <div class="flex flex-col">
                    <label for="lokasi_pertanian" class="text-lg font-medium text-gray-700">Lokasi Pertanian</label>
                    <input type="text" name="lokasi_pertanian" id="lokasi_pertanian" value="{{ $pertanian->lokasi_pertanian }}" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           placeholder="Masukkan lokasi pertanian" required>
                </div>

                <div class="flex flex-col">
                    <label for="luas_lahan" class="text-lg font-medium text-gray-700">Luas Lahan (ha)</label>
                    <input type="number" step="0.01" name="luas_lahan" id="luas_lahan" value="{{ $pertanian->luas_lahan }}" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           placeholder="Masukkan luas lahan" required>
                </div>

                <div class="text-center mt-8">
                    <button type="submit" class="inline-block w-full bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold px-6 py-3 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
