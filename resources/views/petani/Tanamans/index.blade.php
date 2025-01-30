@extends('layouts.userapp')

@section('content')
<header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Tanaman</h1>
            <p class="text-white text-sm mt-1">User | Tanaman</p>
        </div>
    </div>
</header>

<div class="container mx-auto mt-8 pr-3">
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('tanamans.index') }}" method="GET" class="flex">
            <input type="text" name="search" placeholder="Cari tanaman..." 
                class="border border-gray-300 rounded-l-lg px-4 py-2 focus:ring focus:ring-green-400" 
                value="{{ request('search') }}">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-r-lg hover:bg-green-700">
                Cari
            </button>
        </form>
        <a href="{{ route('tanamans.create') }}" 
           class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-lg hover:bg-green-700">
            Tambah
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($tanamans as $tanaman)
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">{{ $tanaman->nama_tanaman }}</h2>
                <p class="text-gray-600 mt-1 text-sm">Jenis: {{ $tanaman->jenis }}</p>
                <p class="text-gray-500 mt-2 text-sm">{{ Str::limit($tanaman->deskripsi, 100) }}</p>
                <div class="flex justify-end space-x-4 mt-4">
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" 
                       class="text-yellow-500 hover:text-yellow-700 text-lg">✏️</a>
                    <form action="{{ route('tanamans.destroy', $tanaman->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-lg" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center py-4 text-gray-500">Tidak ada data tanaman ditemukan</p>
        @endforelse
    </div>
</div>
@endsection

