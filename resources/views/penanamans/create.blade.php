<x-app-layout>
    <x-slot name="title">Tambah Penanaman</x-slot>

    <div class="container mx-auto py-10 px-6">
       

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="alert bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Penanamans.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <!-- Pilihan Pertanian -->
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ old('pertanian_id') == $pertanian->id ? 'selected' : '' }}>
                            {{ $pertanian->nama_pertanian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan Tanaman -->
            <div class="mb-4">
                <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @foreach ($tanamans as $tanaman)
                        <option value="{{ $tanaman->id }}" {{ old('tanaman_id') == $tanaman->id ? 'selected' : '' }}>
                            {{ $tanaman->nama_tanaman }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Tanam -->
            <div class="mb-4">
                <label for="tanggal_tanam" class="block text-sm font-medium text-gray-700">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" id="tanggal_tanam" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('tanggal_tanam') }}">
            </div>

            <!-- Jumlah Tanaman -->
            <div class="mb-4">
                <label for="jumlah_tanaman" class="block text-sm font-medium text-gray-700">Jumlah Tanaman</label>
                <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('jumlah_tanaman') }}">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
