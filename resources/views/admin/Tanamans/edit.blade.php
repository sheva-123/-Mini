<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Edit Tanaman</h1>
                <p class="text-white text-sm mt-1">Admin | Tanaman</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-8 px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <form action="{{ route('tanamans.update', $tanaman->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_tanaman" class="block text-gray-700">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" id="nama_tanaman" class="p-2 border border-gray-300 rounded-md w-full" value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}" required>
                    @error('nama_tanaman')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700">Jenis Tanaman</label>
                    <input type="text" name="jenis" id="jenis" class="p-2 border border-gray-300 rounded-md w-full" value="{{ old('jenis', $tanaman->jenis) }}" required>
                    @error('jenis')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="p-2 border border-gray-300 rounded-md w-full">{{ old('deskripsi', $tanaman->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
</x-app-layout>