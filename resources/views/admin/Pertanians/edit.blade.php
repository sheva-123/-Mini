<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-2xl">

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

                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-blue-500 text-white font-bold px-6 py-2 rounded-lg">Simpan Perubahan</button>
                    <a href="{{ route('pertanians.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
