<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Detail Laporan</h1>
        </div>
    </header>

    <div class="container mx-auto px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Laporan: {{ $laporan->tanggal_laporan }}</h2>
            <p class="mb-2"><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
            <p><strong>Lokasi Pertanian:</strong> {{ $laporan->pertanian->lokasi_pertanian }}</p>
            <p><strong>Nama Pengguna:</strong> {{ $laporan->pertanian->users->name }}</p>
        </div>
        <a href="{{ route('admin.laporans.index') }}"
            class="mt-4 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>
</x-app-layout>
