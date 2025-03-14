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
                            <h3 class="text-lg font-semibold">Total Tanaman yang Di Tanam</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $penanaman ?? '' }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">Total Tanaman yang Di Panen</h3>
                            <p class="text-2xl font-bold text-green-600">{{ $pemanenan ?? '' }}</p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">Kondisi Lahan</h3>
                            <p class="text-2xl font-bold text-red-600">{{ $lahan->kondisi ?? 'Tidak Ada' }}</p>
                        </div>
                    </div>

                    <!-- Tabel Lahan -->
                    <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800">Informasi Lahan</h3>
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Nama Lahan</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Lokasi</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Tanaman</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Umur Panen</th>
                                    </tr>
                                </thead>

                                @if (is_null($lahan) || empty($lahan))
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-sm font-bold text-gray-500">
                                            Admin Belum Memberikan Anda Lahan.
                                        </td>
                                    </tr>
                                </tbody>
                                @else
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2 text-center text-sm text-gray-600">{{ $lahan->nama_pertanian ?? '' }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-gray-600">{{ $lahan->lokasi_pertanian ?? '' }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-gray-600">
                                            {{ $lahan->tanaman->nama_tanaman ?? '' }}
                                        </td>
                                        <td class="px-4 py-2 text-center text-sm text-gray-600">{{ $lahan->tanaman->umur_panen ?? '' }} Hari</td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>


                    <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800">History Pemeliharaan</h3>
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 h-12 text-left text-sm font-medium text-gray-600">No</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Penanaman</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Jenis Pemeliharaan</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Biaya</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Tanggal</th>
                                    </tr>
                                </thead>
                                @if ($pemeliharaan->isEmpty())
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-sm font-bold text-gray-500">
                                            Tidak Ada Data.
                                        </td>
                                    </tr>
                                </tbody>
                                @else
                                <tbody>
                                    @foreach ($pemeliharaan as $pem)
                                    <tr class="border-t">
                                        <td class="px-4 py-2 text-left text-sm text-white-500">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 text-left text-sm text-white-500">{{ $pem->penanaman->nama }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-white-500">{{ $pem->jenis_pemeliharaan }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-white-500">
                                            {{ $pem->biaya }}
                                        </td>
                                        <td class="px-4 py-2 text-center text-sm text-yellow-500">{{ $pem->created_at->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800">History Pengeluaran</h3>
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 h-12 text-left text-sm font-medium text-gray-600">No</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Penanaman</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Jenis Pengeluaran</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Biaya</th>
                                        <th class="px-4 py-2 h-12 text-center text-sm font-medium text-gray-600">Tanggal</th>
                                    </tr>
                                </thead>
                                @if ($pengeluaran->isEmpty())
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-sm font-bold text-gray-500">
                                            Tidak Ada Data.
                                        </td>
                                    </tr>
                                </tbody>
                                @else
                                <tbody>
                                    @foreach ($pengeluaran as $peng)
                                    <tr class="border-t">
                                        <td class="px-4 py-2 text-left text-sm text-white-500">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 text-left text-sm text-white-500">{{ $peng->penanaman->nama }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-white-500">{{ $peng->jenis_pengeluaran }}</td>
                                        <td class="px-4 py-2 text-center text-sm text-white-500">
                                            {{ $peng->biaya }}
                                        </td>
                                        <td class="px-4 py-2 text-center text-sm text-yellow-500">{{ $peng->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>