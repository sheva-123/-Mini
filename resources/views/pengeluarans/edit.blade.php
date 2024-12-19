<x-app-layout>
    <x-slot name="title">Edit Pengeluaran</x-slot>

    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">✏️ Edit Pengeluaran</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi pengeluaran pertanian di sini</p>
        </div>

        <!-- Form Edit Pengeluaran -->
        <form action="{{ route('pengeluarans.update', $pengeluaran) }}" method="POST" class="bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            @csrf
            @method('PUT')

            <!-- Pertanian -->
            <div class="mb-6">
                <label for="id_pertanian" class="block text-gray-700 font-semibold mb-2">Pertanian</label>
                <select name="id_pertanian" id="id_pertanian" class="form-select w-full border-gray-300 rounded p-2" required>
                    @foreach ($pertanigans as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ $pertanian->id == $pengeluaran->id_pertanian ? 'selected' : '' }}>
                            {{ $pertanian->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pengeluaran -->
            <div class="mb-6">
                <label for="tanggal_pengeluaran" class="block text-gray-700 font-semibold mb-2">Tanggal Pengeluaran</label>
                <input 
                    type="date" 
                    name="tanggal_pengeluaran" 
                    id="tanggal_pengeluaran" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pengeluaran->tanggal_pengeluaran }}" 
                    required>
            </div>

            <!-- Jenis Pengeluaran -->
            <div class="mb-6">
                <label for="jenis_pengeluaran" class="block text-gray-700 font-semibold mb-2">Jenis Pengeluaran</label>
                <input 
                    type="text" 
                    name="jenis_pengeluaran" 
                    id="jenis_pengeluaran" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pengeluaran->jenis_pengeluaran }}" 
                    required>
            </div>

            <!-- Biaya -->
            <div class="mb-6">
                <label for="biaya" class="block text-gray-700 font-semibold mb-2">Biaya</label>
                <input 
                    type="number" 
                    name="biaya" 
                    id="biaya" 
                    class="form-input w-full border-gray-300 rounded p-2" 
                    value="{{ $pengeluaran->biaya }}" 
                    required>
            </div>

            <!-- Tombol Update -->
            <div class="text-center">
                <button type="submit" class="bg-yellow-500 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-yellow-600 transition-transform transform hover:scale-105">
                    Update Pengeluaran
                </button>
            </div>
        </form>

        <!-- Kembali -->
        <div class="text-center mt-6">
            <a href="{{ route('pengeluarans.index') }}" class="text-blue-500 hover:text-blue-700">
                <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-100 transition">Kembali</button>
            </a>
        </div>
    </div>
</x-app-layout>
