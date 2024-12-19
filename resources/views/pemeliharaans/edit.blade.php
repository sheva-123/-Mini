<x-app-layout>
    <x-slot name="title">Edit Pemeliharaan</x-slot>

    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">✏️ Edit Pemeliharaan</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi pemeliharaan tanaman di sini</p>
        </div>

        <!-- Form Edit Pemeliharaan -->
        <form action="{{ route('pemeliharaans.update', $pemeliharaans) }}" method="POST" class="bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            @csrf
            @method('PUT')

            <!-- Penanaman -->
            <div class="mb-6">
                <label for="penanaman_id" class="block text-gray-700 font-semibold mb-2">Penanaman</label>
                <select name="penanaman_id" id="penanaman_id" class="form-select w-full border-gray-300 rounded p-2" required>
                    <option value="">Pilih Penanaman</option>
                    @foreach($penanaman as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $pemeliharaans->penanaman_id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pemeliharaan -->
            <div class="mb-6">
                <label for="tanggal_pemeliharaan" class="block text-gray-700 font-semibold mb-2">Tanggal Pemeliharaan</label>
                <input 
                    type="date" 
                    name="tanggal_pemeliharaan" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pemeliharaans->tanggal_pemeliharaan }}" 
                    required>
            </div>

            <!-- Jenis Pemeliharaan -->
            <div class="mb-6">
                <label for="jenis_pemeliharaan" class="block text-gray-700 font-semibold mb-2">Jenis Pemeliharaan</label>
                <input 
                    type="text" 
                    name="jenis_pemeliharaan" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pemeliharaans->jenis_pemeliharaan }}" 
                    required>
            </div>

            <!-- Biaya -->
            <div class="mb-6">
                <label for="biaya" class="block text-gray-700 font-semibold mb-2">Biaya</label>
                <input 
                    type="text" 
                    name="biaya" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pemeliharaans->biaya }}" 
                    required>
            </div>

            <!-- Tombol Perbarui -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-transform transform hover:scale-105">
                    Perbarui Pemeliharaan
                </button>
            </div>
        </form>

        <!-- Tombol Kembali -->
        <div class="text-center mt-6">
            <a href="{{ route('pemeliharaans.index') }}" class="text-blue-500 hover:text-blue-700">
                <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-100 transition">Kembali</button>
            </a>
        </div>
    </div>
</x-app-layout>
