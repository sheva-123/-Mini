<x-app-layout>
    <x-slot name="title">Edit Laporan</x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">✍️ Edit Laporan Pertanian</h1>

        <!-- Form Edit Laporan -->
        <form action="{{ route('laporans.update', $laporan) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Dropdown Pertanian -->
            <div>
                <label for="pertanian_id" class="block text-lg font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id"
                        class="form-select w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Pilih Pertanian</option>
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ $pertanian->id == $laporan->pertanian_id ? 'selected' : '' }}>
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
                <label for="tanggal_laporan" class="block text-lg font-medium text-gray-700">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan"
                       class="form-input w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('tanggal_laporan', $laporan->tanggal_laporan) }}">
                @error('tanggal_laporan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-lg font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="form-textarea w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Update & Batal -->
            <div class="flex space-x-4">
                <button type="submit" class="btn bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition">
                    Update
                </button>
                <a href="{{ route('laporans.index') }}" 
                   class="btn bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
