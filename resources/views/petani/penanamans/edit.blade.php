@extends('layouts.userapp')

@section('content')
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Edit Penanaman</h1>
                <p class="text-white text-sm mt-1">User | Edit Penanaman</p>
            </div>
        </div>
    </header>
    <div class="container mx-auto mt-8 pr-3">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <form action="{{ route('Penanamans.update', $penanaman) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Pertanian</label>
                    <select name="pertanian_id" id="pertanian_id" class="w-full p-2 border rounded-lg">
                        @foreach ($pertanians as $pertanian)
                            <option value="{{ $pertanian->id }}" 
                                    {{ $penanaman->pertanian_id == $pertanian->id ? 'selected' : '' }}>
                                {{ $pertanian->nama_pertanian }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Tanaman</label>
                    <select name="tanaman_id" id="tanaman_id" class="w-full p-2 border rounded-lg">
                        @foreach ($tanamans as $tanaman)
                            <option value="{{ $tanaman->id }}" 
                                    {{ $penanaman->tanaman_id == $tanaman->id ? 'selected' : '' }}>
                                {{ $tanaman->nama_tanaman }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_tanam" class="block text-sm font-medium text-gray-700">Tanggal Tanam</label>
                    <input type="date" name="tanggal_tanam" id="tanggal_tanam" value="{{ $penanaman->tanggal_tanam }}" 
                           class="w-full p-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="jumlah_tanaman" class="block text-sm font-medium text-gray-700">Jumlah Tanaman</label>
                    <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" value="{{ $penanaman->jumlah_tanaman }}" 
                           class="w-full p-2 border rounded-lg" required>
                </div>
                <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-transform transform hover:scale-95">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection
