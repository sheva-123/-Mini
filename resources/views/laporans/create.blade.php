<x-app-layout>
    <x-slot name="title">Tambah Laporan</x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">📝 Tambah Laporan</h1>

        <!-- Form Tambah Laporan -->
        <form action="{{ route('laporans.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Dropdown Pertanian -->
            <div>
                <label for="pertanian_id" class="block font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="form-select w-full border border-gray-300 rounded-lg p-3">
                    <option value="" disabled selected>Pilih Pertanian</option>
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ old('pertanian_id') == $pertanian->id ? 'selected' : '' }}>
                            {{ $pertanian->nama }}
                        </option>
                    @endforeach
                </select>
                @error('pertanian_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Laporan -->
            <div>
                <label for="tanggal_laporan" class="block font-medium text-gray-700">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan"
                       class="form-input w-full border border-gray-300 rounded-lg p-3"
                       value="{{ old('tanggal_laporan') }}">
                @error('tanggal_laporan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6"
                          class="form-textarea w-full border border-gray-300 rounded-lg p-3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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
            <a href="{{ route('laporans.index') }}" 
               class="inline-block w-full py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition-transform transform hover:scale-105">
                Kembali
            </a>
        </div>
        </form>
    </div>
</x-app-layout>
