<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Lahan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <x-sidebar></x-sidebar>

    <div class="flex-1 p-3 py-1 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Tambah Data Lahan</h1>
                <p class="text-white text-sm mt-1">Admin | Tambah Lahan</p>
            </div>
        </header>

        <div class="mt-6 p-5 rounded-lg">
            <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <form action="{{ route('pertanians.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="lokasi_pertanian" class="text-lg font-medium text-gray-700">Nama Lahan</label>
                        <input type="text" name="nama_pertanian" id="nama_pertanian" class="w-full p-2 border rounded-lg" placeholder="Masukkan nama pertanian" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama_pertanian" class="text-lg font-medium text-gray-700">Lokasi Lahan</label>
                        <input type="text" name="lokasi_pertanian" id="lokasi_pertanian" class="w-full p-2 border rounded-lg" placeholder="Masukkan lokasi pertanian" required>
                    </div>
                    <div class="mb-4">
                        <label for="luas_lahan" class="text-lg font-medium text-gray-700">Luas Lahan (ha)</label>
                        <input type="number" step="0.01" name="luas_lahan" id="luas_lahan" class="w-full p-2 border rounded-lg" placeholder="Masukkan luas lahan" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Tanaman</label>
                        <select name="tanaman_id" id="tanaman_id" class="w-full p-2 border rounded-lg">
                            @foreach ($tanamans as $tanaman)
                            <option value="{{ $tanaman->id }}">{{ $tanaman->nama_tanaman }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_tanaman" class="block text-sm font-medium text-gray-700">Jumlah Tanaman</label>
                        <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" class="w-full p-2 border rounded-lg" required>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                        Simpan
                    </button>
                    <a href="{{ route('pertanians.index') }}">
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