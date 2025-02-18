<x-app-layout>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Detail Lahan Pertanian</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <h4 class="text-lg font-semibold">Nama Pertanian:</h4>
            <p class="text-gray-700">{{ $pertanian->nama_pertanian }}</p>
        </div>

        <div class="mb-4">
            <h4 class="text-lg font-semibold">Lokasi:</h4>
            <p class="text-gray-700">{{ $pertanian->lokasi_pertanian }}</p>
        </div>

        <div class="mb-4">
            <h4 class="text-lg font-semibold">Luas Lahan:</h4>
            <p class="text-gray-700">{{ $pertanian->luas_lahan }} m²</p>
        </div>

        <div class="mb-4">
            <h4 class="text-lg font-semibold">Tanaman:</h4>
            <p class="text-gray-700">{{ $pertanian->tanamans->nama_tanaman ?? 'Tidak Diketahui' }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('pertanians.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
        </div>
    </div>
</div>
</x-app-layout>
