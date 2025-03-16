<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<x-navbar></x-navbar>

<body class="bg-gray-100 flex flex-wrap pt-20">
    <!-- User Sidebar -->
    <x-usersidebar></x-usersidebar>

    <!-- Main Content -->
    <div class="flex-1 p-7 py-4 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Detail Data Laporan</h1>
                <p class="text-white text-sm mt-1">User | Detail Laporan</p>
            </div>
        </header>

        <!-- Informasi Lahan dan Tanaman -->
        <div class="bg-white p-6 mb-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-2">Laporan Penanaman</h2>
            <p class="text-gray-600">Berikut adalah data terkait penanaman pada laporan ini.</p>

            <div class="py-5 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-slate-500 text-white p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Tanggal Tanam</h3>
                    <p class="text-2xl font-bold">{{ $penanaman->tanggal_tanam }}</p>
                </div>
                <div class="bg-indigo-500 text-white p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Tanggal Panen</h3>
                    <p class="text-2xl font-bold">{{ $pemanenan->tanggal_pemanenan }}</p>
                </div>
                <div class="bg-cyan-500 text-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Pengeluaran</h3>
                    <p class="text-2xl font-bold">Rp {{ number_format($pengeluaranJml, 0, ',', '.') }}</p>
                </div>
                <div class="bg-amber-500 text-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Jumlah Tanaman</h3>
                    <p class="text-2xl font-bold">{{ $penanaman->jumlah_tanaman }}</p>
                </div>
                <div class="bg-sky-500 text-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Panen</h3>
                    <p class="text-2xl font-bold">{{ $pemanenan->jumlah_hasil }}</p>
                </div>
                <div class="bg-emerald-500 text-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Status Panen</h3>
                    <p class="text-2xl font-bold">{{ $pemanenan->status_panen }}</p>
                </div>
            </div>
        </div>

        <!-- Kartu Ringkasan -->


        <!-- Tabel Pemeliharaan -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800">Data Pemeliharaan</h3>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 h-12 text-left text-sm font-medium text-gray-600">No</th>
                            <th class="px-4 py-2 h-12 text-left text-sm font-medium text-gray-600">Jenis Pemeliharaan</th>
                            <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Biaya</th>
                            <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Kondisi Tanaman</th>
                            <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pemeliharaan->isEmpty())
                        <div class="text-center py-6">
                            <p class="text-gray-500">Tidak ada data.</p>
                        </div>
                        @else
                        @foreach ($pemeliharaan as $pem)
                        <tr class="border-t">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $pem->jenis_pemeliharaan }}</td>
                            <td class="px-4 py-2 text-center text-sm text-yellow-500">{{ $pem->biaya }}</td>
                            <td class="px-4 py-2 text-center text-sm text-yellow-500">{{ $pem->kondisi_tanaman }}</td>
                            <td class="px-4 py-2 text-center text-sm text-green-500">{{ $pem->tanggal_pemeliharaan }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Pengeluaran -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800">Data Pengeluaran</h3>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">No</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Jenis Pengeluaran</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Biaya</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pengeluaran->isEmpty())
                        <div class="text-center py-6">
                            <p class="text-gray-500">Tidak ada data.</p>
                        </div>
                        @else
                        @foreach ($pengeluaran as $pen)
                        <tr class="border-t">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $pen->jenis_pengeluaran }}</td>
                            <td class="px-4 py-2 text-center text-sm text-yellow-500">{{ $pen->biaya }}</td>
                            <td class="px-4 py-2 text-center text-sm text-green-500">{{ $pen->tanggal_pengeluaran }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
