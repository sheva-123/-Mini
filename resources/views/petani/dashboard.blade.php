<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <!-- User Sidebar -->
    <x-usersidebar></x-usersidebar>

    <!-- Main Content -->
    <div class="flex-1 p-1 py-1 md:ml-64">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-600 mb-6">Berikut adalah ringkasan tanaman, penanaman, dan pengeluaran Anda.</p>

                    <!-- Kartu Ringkasan -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">Total Penanaman</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $penanaman }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">Total Pemanenan</h3>
                            <p class="text-2xl font-bold text-green-600">{{ $pemanenan }}</p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">Kondisi Lahan</h3>
                            <p class="text-2xl font-bold text-red-600">{{ $lahan->kondisi }}</p>
                        </div>
                    </div>

                    <!-- Tabel Lahan -->
                    <div class="bg-white mt-8 rounded-lg shadow">
                        <h2 class="p-5 text-xl font-bold mb-4">Lahan Anda</h2>

                        <div class="p-3 overflow-x-auto">
                            @if (is_null($lahan))
                            <div class="text-center py-6">
                                <p class="text-gray-500">Admin Belum Memberi Anda Lahan.</p>
                            </div>
                            @else
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left">Nama Lahan</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Lokasi Lahan</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Luas Lahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-200 px-4 py-2">{{ $lahan->nama_pertanian }}</td>
                                        <td class="border border-gray-200 px-4 py-2">{{ $lahan->lokasi_pertanian }}</td>
                                        <td class="border border-gray-200 px-4 py-2">{{ $lahan->luas_lahan }} ha</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                        </div>
                    </div>

                    <!-- Tabel Tanaman -->
                    <div class="bg-white mt-8 rounded-lg shadow">
                        <h2 class="p-5 text-xl font-bold mb-4">Tanaman Anda</h2>

                        <div class="p-3 overflow-x-auto">
                            @if (is_null($tanaman))
                            <div class="text-center py-6">
                                <p class="text-gray-500">Tidak ada data yang tersedia.</p>
                            </div>
                            @else
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left">Nama Tanaman</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Jenis Tanaman</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Umur Panen</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Deskripsi Tanaman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-200 px-4 py-2">{{ $tanaman->nama_tanaman }}</td>
                                        <td class="border border-gray-200 px-4 py-2">{{ $tanaman->jenis }}</td>
                                        <td class="border border-gray-200 px-4 py-2">{{ $tanaman->umur_panen }} Hari</td>
                                        <td class="border border-gray-200 px-4 py-2">{{ $tanaman->deskripsi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>