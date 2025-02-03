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
            <form action="{{ route('tanamans.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_tanaman" class="block text-gray-700">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" id="nama_tanaman" class="p-2 border border-gray-300 rounded-md w-full" required>
                    @error('nama_tanaman')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700">Jenis Tanaman</label>
                    <input type="text" name="jenis" id="jenis" class="p-2 border border-gray-300 rounded-md w-full" required>
                    @error('jenis')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
</x-app-layout>
