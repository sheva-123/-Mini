@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Pemanenan</h1>
            <p class="text-white text-sm mt-1">User | Pemanenan</p>
        </div>
    </div>
</header>
<div class="flex flex-col md:flex-row justify-between items-start md:items-center px-4 pt-2 gap-3">
    <!-- Search and Filter Section -->
    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
        <form action="{{ route('penanamans.index') }}" method="get">
            <div class="relative flex-1">
                <input type="text"
                    placeholder="Cari..." name="search" value="{{ request()->get('search') }}"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none shadow-sm">
                <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Tanggal Tanam -->
            <div>
                <label for="tanggal_awal" class="text-sm text-gray-600">Tanggal Awal :</label>
                <input type="date" name="tanggal_awal" id="tanggal_tanam_awal" value="{{ request('tanggal_awal') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none">
            </div>

            <!-- Tanggal Panen -->
            <div>
                <label for="tanggal_akhir" class="text-sm text-gray-600">Tanggal Akhir :</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none">
            </div>

            <select class="w-full sm:w-40 px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none shadow-sm hover:bg-gray-50">
                <option value="" selected disabled>Urutan Data</option>
                <option value="new">Terbaru</option>
                <option value="old">Terlama</option>
            </select>

            <!-- Tombol Filter -->
            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-green-700 transition">
                Filter
            </button>
        </form>
    </div>

    <!-- Tambah Button -->
    <a href="{{ route('pemanenans.create') }}"
        class="inline-flex items-center bg-green-600 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-green-700 transition-transform transform hover:scale-95 w-full md:w-auto justify-center">
        Tambah
    </a>
</div>
<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">

        <div class="relative overflow-x-auto">
            <table class="w-full text-md text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Pertanian</th>
                        <th scope="col" class="px-6 py-3">Tanggal Panen</th>
                        <th scope="col" class="px-6 py-3">Jumlah Hasil</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemanenans as $pemanenan)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $pemanenan->pertanian->nama_pertanian ?? 'Tidak diketahui' }}</td>
                        <td class="px-6 py-4">{{ $pemanenan->tanggal_pemanenan }}</td>
                        <td class="px-6 py-4">{{ $pemanenan->jumlah_hasil }} </td>
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <a href="{{ route('pemanenans.edit', $pemanenan->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                </svg>
                            </a>
                            <form action="{{ route('pemanenans.destroy', $pemanenan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="deleteRecord(event)">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 6M12 6v12m6 0H6" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($pemanenans->isEmpty())
            <div class="text-center py-6">
                <p class="text-gray-500">Tidak ada data yang tersedia.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
