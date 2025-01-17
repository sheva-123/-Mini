<x-app-layout>
    <x-slot name="title">Tambah Pemeliharaan</x-slot>

    <div class="container mx-auto py-10">


        <!-- Pesan error -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('pemeliharaans.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            @csrf

            <!-- Penanaman -->
            <div class="mb-6">
                <label for="pertanian_id" class="block text-gray-700 font-semibold mb-2">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="form-select w-full border-gray-300 rounded p-2" required>
                    <option value="">Pilih Penanaman</option>
                    @foreach($pertanian as $p)
                        <option value="{{ $p->id }}" {{ old('penanaman_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_pertanian }}
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
                    id="tanggal_pemeliharaan"
                    class="form-input w-full border-gray-300 rounded p-2"
                    value="{{ old('tanggal_pemeliharaan') }}"
                    required>
            </div>

            <!-- Jenis Pemeliharaan -->
            <div class="mb-6">
                <label for="jenis_pemeliharaan" class="block text-gray-700 font-semibold mb-2">Jenis Pemeliharaan</label>
                <input
                    type="text"
                    name="jenis_pemeliharaan"
                    id="jenis_pemeliharaan"
                    class="form-input w-full border-gray-300 rounded p-2"
                    value="{{ old('jenis_pemeliharaan') }}"
                    placeholder="Masukkan jenis pemeliharaan"
                    required>
            </div>

            <!-- Biaya -->
            <div class="mb-6">
                <label for="biaya" class="block text-gray-700 font-semibold mb-2">Biaya</label>
                <input
                    type="text"
                    name="biaya"
                    id="biaya"
                    class="form-input w-full border-gray-300 rounded p-2"
                    value="{{ old('biaya') }}"
                    placeholder="Masukkan biaya pemeliharaan"
                    required>
            </div>

                <!-- Tombol Simpan -->
                <div class="text-center mt-8">
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                        Simpan Data
                    </button>
                </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="{{ route('pemeliharaans.index') }}"
                   class="inline-block w-full py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition-transform transform hover:scale-105">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
