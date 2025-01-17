<x-app-layout>
    <x-slot name="title">Edit Penanaman</x-slot>

    <div class="container mx-auto py-10 px-6">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900">✏️ Edit Penanaman</h1>
            <p class="text-gray-600 mt-2">Perbarui data penanaman yang ada</p>
        </div>

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

        <form action="{{ route('penanamans.update', $penanamans->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <!-- Pilihan Pertanian -->
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ $penanamans->pertanian_id == $pertanian->id ? 'selected' : '' }}>
                            {{ $pertanian->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan Tanaman -->
            <div class="mb-4">
                <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @foreach ($tanaman as $tanaman)
                        <option value="{{ $tanaman->id }}" {{ $penanamans->tanaman_id == $tanaman->id ? 'selected' : '' }}>
                            {{ $tanaman->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Tanam -->
            <div class="mb-4">
                <label for="tanggal_tanam" class="block text-sm font-medium text-gray-700">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" id="tanggal_tanam" value="{{ $penanamans->tanggal_tanam }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>

            <!-- Jumlah Tanaman -->
            <div class="mb-4">
                <label for="jumlah_tanaman" class="block text-sm font-medium text-gray-700">Jumlah Tanaman</label>
                <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" value="{{ $penanamans->jumlah_tanaman }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
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
