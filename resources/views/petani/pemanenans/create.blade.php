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
                <form action="{{ route('pemanenans.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Nama Lahan</label>
                        <select name="pertanian_id" id="pertanian_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            @foreach ($pertanians as $pertanian)
                            <option value="{{ $pertanian->id }}">{{ $pertanian->nama_pertanian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="penanaman_id" class="block text-sm font-medium text-gray-700">Nama Penanaman</label>
                        <select name="penanaman_id" id="penanaman_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            @foreach ($penanaman as $penanaman)
                            <option value="{{ $penanaman->id }}">{{ $penanaman->nama }}, {{ $penanaman->jumlah_tanaman }} Tanaman</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_pemanenan" class="block text-sm font-medium text-gray-700">Tanggal Pemanenan</label>
                        <input type="date" name="tanggal_pemanenan" id="tanggal_pemanenan" class="w-full p-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_hasil" class="block text-sm font-medium text-gray-700">Jumlah Hasil</label>
                        <input type="number" name="jumlah_hasil" id="jumlah_hasil" class="w-full p-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="status_panen" class="block text-sm font-medium text-gray-700">Status Panen</label>
                        <select name="status_panen" id="status_panen" class="w-full p-2 border rounded-lg" required>
                            <option value="" disabled selected>Pilih Status Panen</option>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Gagal">Gagal</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                        Simpan
                    </button>
                    <a href="{{ route('pemanenans.index') }}">
                        <button type="button" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-95">
                            Kembali
                        </button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
