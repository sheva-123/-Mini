<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Tanaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<x-navbar></x-navbar>

<body class="bg-gray-100 flex flex-wrap pt-20">
    <x-sidebar></x-sidebar>

    <div class="flex-1 p-3 py-1 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Tambah Data Tanaman</h1>
                <p class="text-white text-sm mt-1">Admin | Tambah Tanaman</p>
            </div>
        </header>

        <div class="mt-6 px-8 py-1 rounded-lg">
            <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <form action="{{ route('tanamans.update', $tanaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_tanaman" class="block text-sm font-medium text-gray-700">Nama Tanaman</label>
                        <input type="text" name="nama_tanaman" id="nama_tanaman"
                            class="w-full p-2 border rounded-lg"
                            placeholder="Masukkan nama tanaman" value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="jenis" class="text-lg font-medium text-gray-700">Jenis</label>
                        <select name="jenis" id="jenis"
                            class="w-full p-2 border rounded-lg" value="{{ old('jenis', $tanaman->jenis) }}"
                            required>
                            <option value="" disabled selected>Pilih jenis tanaman</option>
                            @foreach (\App\Models\Tanaman::getJenisOptions() as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="umur_panen" class="block text-sm font-medium text-gray-700">Umur Panen</label>
                        <input type="number" name="umur_panen" id="umur_panen"
                            class="w-full p-2 border rounded-lg"
                            placeholder="Masukkan umur panen tanaman" value="{{ old('umur_panen', $tanaman->umur_panen) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="text-lg font-medium text-gray-700">Deskripsi</label>
                        <textarea textarea rows="4"
                            class="block p-2.5 w-full text-sm text-black rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500""
                            type=" text" name="deskripsi" required>{{ old('deskripsi', $tanaman->deskripsi) ?? '' }}</textarea>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-95">
                        Simpan
                    </button>
                    <a href="{{ route('tanamans.index') }}">
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
