<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tambah Laporan</h1>

        <!-- Form Tambah Laporan -->
        <form action="{{ route('laporans.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Dropdown Pertanian -->
            <div>
                <label for="pertanian_id" class="block font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id"
                        class="form-select w-full border border-gray-300 rounded p-2">
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
                       class="form-input w-full border border-gray-300 rounded p-2"
                       value="{{ old('tanggal_laporan') }}">
                @error('tanggal_laporan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="form-textarea w-full border border-gray-300 rounded p-2">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div>
                <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>
                <a href="{{ route('laporans.index') }}"
                   class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
