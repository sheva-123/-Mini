<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penanaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <!-- User Sidebar -->
    <x-usersidebar></x-usersidebar>

    <!-- Main Content -->
    <div class="flex-1 p-7 py-4 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Data Penanaman</h1>
                <p class="text-white text-sm mt-1">User | Penanaman</p>
            </div>
        </header>

        <!-- Filter & Search -->
        <div class="flex flex-wrap justify-between items-center gap-4">
            <form action="{{ route('penanamans.index') }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                <input type="text" name="search" placeholder="Cari..." class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('search') }}">
                <input type="date" name="tanggal_awal" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('tanggal_awal') }}">
                <input type="date" name="tanggal_akhir" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('tanggal_akhir') }}">
                <select name="sort" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Urutan Data</option>
                    <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                    <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Filter</button>
            </form>
            <a href="{{ route('penanamans.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Tambah</a>
        </div>

        <!-- Table Data -->
        <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full text-md text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Tanaman</th>
                            <th scope="col" class="px-6 py-3">Tanggal Tanam</th>
                            <th scope="col" class="px-6 py-3">Perkiraan Panen</th>
                            <th scope="col" class="px-6 py-3">Jumlah Tanaman</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penanamans as $p)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $p->nama }}</td>
                            <td class="px-6 py-4">{{ $p->tanaman->nama_tanaman }}</td>
                            <td class="px-6 py-4">{{ $p->tanggal_tanam }}</td>
                            <td class="px-6 py-4">{{ $p->expired }}</td>
                            <td class="px-6 py-4">{{ $p->jumlah_tanaman }}</td>
                            <td class="px-6 py-4">
                                @if($p->status === 'Selesai')
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Selesai
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    Proses
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <a href="{{ route('penanamans.edit', $p) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('penanamans.destroy', $p) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="deleteRecord(event)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($penanamans->isEmpty())
                <div class="text-center py-6">
                    <p class="text-gray-500">Tidak ada data yang tersedia.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>