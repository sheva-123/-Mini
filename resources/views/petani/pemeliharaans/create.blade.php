@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Pemeliharaan</h1>
            <p class="text-white text-sm mt-1">User | Tambah Pemeliharaan</p>
        </div>
    </div>
</header>
<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('pemeliharaans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="w-full p-2 border rounded-lg">
                    @foreach ($pertanians as $pertanian)
                    <option value="{{ $pertanian->id }}">{{ $pertanian->nama_pertanian }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_pemeliharaan" class="block text-sm font-medium text-gray-700">Tanggal Pemeliharaan</label>
                <input type="date" name="tanggal_pemeliharaan" id="tanggal_pemeliharaan"
                    class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="jenis_pemeliharaan" class="block text-sm font-medium text-gray-700">Jenis Pemeliharaan</label>
                <input type="text" name="jenis_pemeliharaan" id="jenis_pemeliharaan"
                    class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya</label>
                <input type="number" name="biaya" id="biaya" class="w-full p-2 border rounded-lg" required>
            </div>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                Simpan
            </button>
            <a href="{{ route('pemeliharaans.index') }}">
                <button type="button"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                    Kembali
                </button>
            </a>
        </form>
    </div>
</div>
@endsection