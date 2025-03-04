@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Pengeluaran</h1>
            <p class="text-white text-sm mt-1">User | Pengeluaran</p>
        </div>
    </div>
</header>
<div class="flex flex-col md:flex-row justify-between items-center px-4 pt-2 gap-4">
    <!-- Search and Filter Section -->
    <form action="{{ route('penanamans.index') }}" method="get" class="flex flex-wrap items-end gap-3 w-full md:w-auto">
        <!-- Search Input -->
        <div class="relative">
            <label for="search" class="sr-only">Cari</label>
            <input type="text" id="search" placeholder="Cari..." name="search" value="{{ request()->get('search') }}"
                class="w-full sm:w-56 px-4 py-[10px] rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none shadow-sm">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Tanggal Tanam -->
        <div class="flex flex-col">
            <label for="tanggal_awal" class="text-sm text-gray-600">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ request('tanggal_awal') }}"
                class="px-4 py-[10px] rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none w-full sm:w-auto">
        </div>

        <!-- Tanggal Panen -->
        <div class="flex flex-col">
            <label for="tanggal_akhir" class="text-sm text-gray-600">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                class="px-4 py-[10px] rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none w-full sm:w-auto">
        </div>

        <!-- Sorting -->
        <div>
            <label for="sort" class="sr-only">Urutan Data</label>
            <select name="sort" id="sort"
                class="px-4 py-[10px] rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none shadow-sm hover:bg-gray-50 w-full sm:w-40">
                <option value="">Urutan Data</option>
                <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
            </select>
        </div>

        <!-- Tombol Filter -->
        <button type="submit"
            class="bg-green-600 text-white px-5 py-[10px] rounded-lg shadow-lg hover:bg-green-700 transition">
            Filter
        </button>
    </form>

    <!-- Tambah Button -->
    <a href="{{ route('pengeluarans.create') }}"
        class="bg-green-600 text-white mt-5 px-5 py-[10px] rounded-lg shadow-lg hover:bg-green-700 transition-transform transform hover:scale-95 w-full md:w-auto text-center">
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
                        <th scope="col" class="px-6 py-3">Tanggal Pengeluaran</th>
                        <th scope="col" class="px-6 py-3">Jenis Pengeluaran</th>
                        <th scope="col" class="px-6 py-3">Biaya</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluarans as $pengeluaran)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $pengeluaran->tanggal_pengeluaran }}</td>
                        <td class="px-6 py-4">{{ $pengeluaran->jenis_pengeluaran }} </td>
                        <td class="px-6 py-4">Rp {{ number_format($pengeluaran->biaya, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <a href="{{ route('pengeluarans.edit', $pengeluaran) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                </svg>
                            </a>
                            <form action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}" method="POST">
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
            @if ($pengeluarans->isEmpty())
            <div class="text-center py-6">
                <p class="text-gray-500">Tidak ada data yang tersedia.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
