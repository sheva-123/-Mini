@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Edit Data Tanaman</h1>
        <p class="text-white text-sm mt-1">User | Edit Tanaman</p>
    </div>
</header>

<div class="container mx-auto mt-8">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('tanamans.update', $tanaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_tanaman" class="block text-sm font-medium text-gray-700">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" id="nama_tanaman" value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}"
                       class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('nama_tanaman')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                <input type="text" name="jenis" id="jenis" value="{{ old('jenis', $tanaman->jenis) }}"
                       class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('jenis')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">{{ old('deskripsi', $tanaman->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('tanamans.index') }}" 
                   class="inline-flex items-center px-5 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition-transform transform hover:scale-95 mr-3">
                    Batal
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition-transform transform hover:scale-95">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
