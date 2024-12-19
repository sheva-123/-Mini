<x-app-layout>
    <div class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-2xl">
            <h1 class="text-4xl font-extrabold text-green-700 text-center mb-4">💸 Tambah Pengeluaran</h1>
            <p class="text-center text-gray-600 mb-8">Isi formulir untuk menambahkan data pengeluaran baru</p>

            <form action="{{ route('pengeluarans.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Pilih Pertanian -->
                <div class="flex flex-col">
                    <label for="nama_pertanian" class="text-lg font-medium text-gray-700">Pilih Pertanian</label>
                    <select name="nama_pertanian" 
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition">
                        @foreach ($pertanian as $pertanianItem)
                            <option value="{{ $pertanianItem->nama_pertanian }}">{{ $pertanianItem->nama_pertanian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Pengeluaran -->
                <div class="flex flex-col">
                    <label for="tanggal_pengeluaran" class="text-lg font-medium text-gray-700">Tanggal Pengeluaran</label>
                    <input type="date" name="tanggal_pengeluaran" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           required>
                </div>

                <!-- Jenis Pengeluaran -->
                <div class="flex flex-col">
                    <label for="jenis_pengeluaran" class="text-lg font-medium text-gray-700">Jenis Pengeluaran</label>
                    <input type="text" name="jenis_pengeluaran" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           placeholder="Masukkan jenis pengeluaran" required>
                </div>

                <!-- Biaya -->
                <div class="flex flex-col">
                    <label for="biaya" class="text-lg font-medium text-gray-700">Biaya</label>
                    <input type="text" name="biaya" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" 
                           placeholder="Masukkan jumlah biaya" required>
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
                <a href="{{ route('pengeluarans.index') }}" 
                   class="inline-block w-full py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition-transform transform hover:scale-105">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
