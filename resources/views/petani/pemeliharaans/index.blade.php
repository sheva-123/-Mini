@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Pemeliharaan</h1>
            <p class="text-white text-sm mt-1">User | Pemeliharaan</p>
        </div>
    </div>
</header>
<div class="flex flex-col md:flex-row justify-between items-start md:items-center px-4 pt-2 gap-3">
    <!-- Search and Filter Section -->
    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
        <!-- Search Input -->
        <div class="relative flex-1">
            <form action="{{ route('pemeliharaans.index') }}" method="get">
                <input type="text"
                    placeholder="Cari..." name="search" value="{{ request()->get('search') }}" onchange="this.form.submit()"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none shadow-sm">
                <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </form>

        </div>

        <form method="GET" action="{{ route('pemeliharaans.index') }}" class="flex flex-wrap gap-3">
            <!-- Tanggal Tanam -->
            <div>
                <label for="tanggal_awal" class="text-sm text-gray-600">Tanggal  Awal :</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ request('tanggal_awal') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none">
            </div>

            <!-- Tanggal Panen -->
            <div>
                <label for="tanggal_akhir" class="text-sm text-gray-600">Tanggal Akhir : </label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none">
            </div>

            <!-- Tombol Filter -->
            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-green-700 transition">
                Filter
            </button>
        </form>
    </div>

    <!-- Tambah Button -->
    <a href="{{ route('pemeliharaans.create') }}"
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
                        <th scope="col" class="px-6 py-3">Tanggal Pemeliharaan</th>
                        <th scope="col" class="px-6 py-3">Jenis Pemeliharaan</th>
                        <th scope="col" class="px-6 py-3">Biaya</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemeliharaans as $pemeliharaan)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $pemeliharaan->pertanian->nama_pertanian ?? 'Tidak diketahui' }}</td>
                        <td class="px-6 py-4">{{ $pemeliharaan->tanggal_pemeliharaan }}</td>
                        <td class="px-6 py-4">{{ $pemeliharaan->jenis_pemeliharaan }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($pemeliharaan->biaya, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <a href="{{ route('pemeliharaans.edit', $pemeliharaan->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                </svg>
                            </a>
                            <form action="{{ route('pemeliharaans.destroy', $pemeliharaan->id) }}" method="POST" enctype="multipart/form-data">
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
            @if ($pemeliharaans->isEmpty())
            <div class="text-center py-6">
                <p class="text-gray-500">Tidak ada data yang tersedia.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
