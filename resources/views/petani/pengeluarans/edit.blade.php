@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Edit Data Pengeluaran</h1>
    </div>
</header>

<div class="container mx-auto mt-4 px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach ($pertanians as $pertanian)
                    <option value="{{ $pertanian->id }}">
                        {{ $pertanian->nama_pertanian }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_pengeluaran" class="block text-sm font-medium text-gray-700">Tanggal Pengeluaran</label>
                <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" value="{{ $pengeluaran->tanggal_pengeluaran }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="jenis_pengeluaran" class="block text-sm font-medium text-gray-700">Jenis Pengeluaran</label>
                <input type="text" name="jenis_pengeluaran" id="jenis_pengeluaran" value="{{ $pengeluaran->jenis_pengeluaran }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya</label>
                <input type="number" name="biaya" id="biaya" value="{{ $pengeluaran->biaya }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                Simpan
            </button>
            <a href="{{ route('pengeluarans.index') }}">
                <button type="button"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                    Kembali
                </button>
            </a>
        </form>
    </div>
</div>
@endsection