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
            <!-- Search Input -->
            <div class="relative flex-1">
                <input type="text"
                       placeholder="Cari..."
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none shadow-sm"
                >
                <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Filter Dropdown -->
            <select class="w-full sm:w-40 px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none shadow-sm hover:bg-gray-50">
                <option value="">Semua Kategori</option>
                <option>Kategori 1</option>
                <option>Kategori 2</option>
                <option>Kategori 3</option>
            </select>
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
                        @if ($pemanenans->count() > 0)
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
                                                    <path d="M18 6L6 6M12 6v12m6 0H6" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 14l2-2 4 4m0 0l6-6m-6 6V10M6 18V6c0-1.1.9-2 2-2h8a2 2 0 012 2v12a2 2 0 01-2 2H8a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="text-xl font-semibold text-gray-600 mt-2">Tidak ada data pemanenan</h3>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection
