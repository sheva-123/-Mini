@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Edit Data Laporan</h1>
        <p class="text-white text-sm mt-1">User | Edit Laporan</p>
    </div>
</header>

<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('laporans.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <option value="" disabled>Pilih Pertanian</option>
                    @foreach ($pertanians as $pertanian)
                    <option value="{{ $pertanian->id }}"
                        {{ $laporan->pertanian_id == $pertanian->id ? 'selected' : '' }}>
                        {{ $pertanian->nama_pertanian }}
                    </option>
                    @endforeach
                </select>
                @error('pertanian_id')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_laporan" class="block text-sm font-medium text-gray-700">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan" value="{{ old('tanggal_laporan', $laporan->tanggal_laporan) }}"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('tanggal_laporan')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                @error('deskripsi')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                Simpan
            </button>
            <a href="{{ route('laporans.index') }}">
                <button type="button"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                    Kembali
                </button>
            </a>
        </form>
    </div>
</div>
@endsection