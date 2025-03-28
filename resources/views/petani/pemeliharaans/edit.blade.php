<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pemanenan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<x-navbar></x-navbar>

<body class="bg-gray-100 flex flex-wrap pt-20">
    <x-usersidebar></x-usersidebar>

    <div class="flex-1 p-3 py-1 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Tambah Data Pemanenan</h1>
                <p class="text-white text-sm mt-1">User | Tambah Pemanenan</p>
            </div>
        </header>

        <div class="mt-6 p-5 rounded-lg">
            <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <form action="{{ route('pemeliharaans.update', $pemeliharaan->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Nama Lahan</label>
                        <select name="pertanian_id" id="pertanian_id" class="w-full p-2 border rounded-lg">
                            @foreach ($pertanians as $pertanian)
                            <option value="{{ $pertanian->id }}"
                                {{ $pemeliharaan->pertanian_id == $pertanian->id ? 'selected' : '' }}>
                                {{ $pertanian->nama_pertanian }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="penanaman_id" class="block text-sm font-medium text-gray-700">Nama Penanaman</label>
                        <select name="penanaman_id" id="penanaman_id" class="w-full p-2 border rounded-lg">
                            @foreach ($penanaman as $penanaman)
                            <option value="{{ $pertanian->id }}"
                                {{ $pemeliharaan->penanaman_id == $penanaman->id ? 'selected' : '' }}>
                                {{ $penanaman->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_pemeliharaan" class="block text-sm font-medium text-gray-700">Tanggal Pemeliharaan</label>
                        <input type="date" name="tanggal_pemeliharaan" id="tanggal_pemeliharaan"
                            value="{{ $pemeliharaan->tanggal_pemeliharaan }}" class="w-full p-2 border rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_pemeliharaan" class="block text-sm font-medium text-gray-700">Jenis Pemeliharaan</label>
                        <input type="text" name="jenis_pemeliharaan" id="jenis_pemeliharaan"
                            value="{{ $pemeliharaan->jenis_pemeliharaan }}" class="w-full p-2 border rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya</label>
                        <input type="number" name="biaya" id="biaya" value="{{ $pemeliharaan->biaya }}"
                            class="w-full p-2 border rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi Tanaman</label>
                        <select name="kondisi" id="kondisi" class="w-full p-2 border rounded-lg" required>
                            <option value="" disabled selected>Pilih Kondisi</option>
                            <option value="Baik" {{ old('kondisi_tanaman', $pemeliharaan->kondisi_tanaman ?? '') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Cukup" {{ old('kondisi_tanaman', $pemeliharaan->kondisi_tanaman ?? '') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Buruk" {{ old('kondisi_tanaman', $pemeliharaan->kondisi_tanaman ?? '') == 'Buruk' ? 'selected' : '' }}>Buruk</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan (opsional)</label>
                        <textarea id="keterangan" name="keterangan" rows="4" class="block p-2.5 w-full text-sm text-black rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keterangan tambahan...">{{ old('keterangan', $pemeliharaan->keterangan ?? '') }}</textarea>
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
    </div>
</body>

</html>
