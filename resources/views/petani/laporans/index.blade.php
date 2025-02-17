@extends('layouts.userapp')

@section('content')
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Laporan</h1>
                <p class="text-white text-sm mt-1">User | Laporan</p>
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
        <a href="{{ route('laporans.create') }}"
            class="inline-flex items-center bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg hover:bg-green-700 transition-transform transform hover:scale-95 w-full md:w-auto justify-center">
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
                            <th scope="col" class="px-6 py-3">Tanggal Laporan</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $l)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $l->pertanian->nama_pertanian }}</td>
                                <td class="px-6 py-4">{{ $l->tanggal_laporan }}</td>
                                <td class="px-6 py-4">{{ $l->deskripsi }} </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('laporans.edit', $l) }}"
                                        class="text-yellow-500 hover:text-yellow-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('laporans.destroy', $l) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="deleteRecord(event)">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                                    stroke="#ff0000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 @endsection


