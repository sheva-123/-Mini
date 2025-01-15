<x-app-layout>
    <div class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-2xl">
            <form action="{{ route('pemanenans.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Tanaman -->
                <div class="flex flex-col">
                    <label for="pertanian_id" class="text-lg font-medium text-gray-700">Pilih Pertanian</label>
                    <select name="pertanian_id"
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition">
                        @foreach ($pertanians as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_pertanian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Jenis Tanaman -->
                <div class="flex flex-col">
                    <label for="tanggal_pemanenan" class="text-lg font-medium text-gray-700">Tanggal Pemanenan</label>
                    <input type="date" name="tanggal_pemanenan" id="tanggal_pemanenan" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" required placeholder="Masukkan jenis tanaman">
                </div>

                <!-- Deskripsi Tanaman -->
                <div class="flex flex-col">
                    <label for="jumlah_hasil" class="text-lg font-medium text-gray-700">Jumlah Hasil Pemanenan</label>
                    <input type="number" name="jumlah_hasil" id="jumlah_hasil" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition" required placeholder="Masukkan jenis tanaman">
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
                <a href="{{ route('pemanenans.index') }}"
                   class="inline-block w-full py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition-transform transform hover:scale-105">
                    Kembali
                </a>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>


{{-- <form action="{{ route('pemanenans.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="id_penanaman">Penanaman</label>
        <select name="id_penanaman" class="form-control" id="id_penanaman">
            @foreach ($penanamans as $penanaman)
                <option value="{{ $penanaman->id }}">{{ $penanaman->nama }}</option>
            @endforeach
        </select>
    </div> --}}
