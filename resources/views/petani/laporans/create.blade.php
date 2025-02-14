@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Tambah Data Laporan</h1>
        <p class="text-white text-sm mt-1">User | Tambah Laporan</p>
    </div>
</header>

<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('laporans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <option value="" disabled selected>Pilih Pertanian</option>
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}">{{ $pertanian->nama_pertanian }}</option>
                    @endforeach
                </select>
                @error('pertanian_id')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_laporan" class="block text-sm font-medium text-gray-700">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan"
                       class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('tanggal_laporan')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"></textarea>
                @error('deskripsi')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('laporans.index') }}"
                   class="inline-flex items-center px-5 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition-transform transform hover:scale-95 mr-3">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition-transform transform hover:scale-95">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
