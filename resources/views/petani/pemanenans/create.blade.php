@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Tambah Data Pemanenan</h1>
        <p class="text-white text-sm mt-1">User | Tambah Pemanenan</p>
    </div>
</header>

<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('pemanenans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    @foreach ($pertanians as $pertanian)
                    <option value="{{ $pertanian->id }}">
                        {{ $pertanian->nama_pertanian }}
                    </option>
                    @endforeach
                </select>
                @error('pertanian_id')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    @foreach ($pertanians as $pertanian)
                    <option value="{{ $pertanian->tanamans->id }}">
                        {{ $pertanian->tanamans->nama_tanaman }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="tanggal_pemanenan" class="block text-sm font-medium text-gray-700">Tanggal Pemanenan</label>
                <input type="date" name="tanggal_pemanenan" id="tanggal_pemanenan" value="{{ old('tanggal_pemanenan') }}"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('tanggal_pemanenan')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jumlah_hasil" class="block text-sm font-medium text-gray-700">Jumlah Hasil</label>
                <input type="number" name="jumlah_hasil" id="jumlah_hasil" value="{{ old('jumlah_hasil') }}"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('jumlah_hasil')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                Simpan
            </button>
            <a href="{{ route('pemanenans.index') }}">
                <button type="button"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                    Kembali
                </button>
            </a>
        </form>
    </div>
</div>
@endsection