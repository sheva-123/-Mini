<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<x-navbar></x-navbar>

<body class="bg-gray-100 flex flex-wrap pt-20">
    <!-- User Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-8 py-4 md:ml-64">
        <header class="bg-gradient-to-r from-Primary to-Secondary py-6 px-8 shadow-md rounded-lg mb-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Data Laporan</h1>
                <p class="text-white text-sm mt-1">User | Laporan</p>
            </div>
        </header>

        <!-- Filter & Search -->
        <div class="flex flex-wrap justify-between items-center gap-4">
            <form action="{{ route('admin.laporans.index') }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                <input type="text" name="search" placeholder="Cari..." class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('search') }}">
                <select name="sort" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Urutan Data</option>
                    <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                    <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="bg-Primary text-white px-5 py-2 rounded-lg hover:bg-green-400">Filter</button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D1FAE5]">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Penanaman</th>
                            <th class="px-6 py-3 text-center">Jumlah Tanaman</th>
                            <th class="px-6 py-3 text-center">Jumlah Panen</th>
                            <th class="px-6 py-3 text-center">Status Panen</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $laporan)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $laporans->firstItem() + $loop->index }}</td>
                            <td class="px-6 py-4">{{ $laporan->nama }}</td>
                            <td class="px-6 py-4 text-center">{{ $laporan->jumlah_tanaman }}</td>
                            <td class="px-6 py-4 text-center">
                                @foreach ($laporan->pemanenan as $p)
                                {{ $p->jumlah_hasil }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4 text-center">
                                @foreach ($laporan->pemanenan as $pem)
                                @if ($pem->status_panen === 'Berhasil')
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    Gagal
                                </span>
                                @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 flex gap-3 items-center">
                                <a href="{{ route('admin.laporans.detail', $laporan->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @if ($laporans->isEmpty())
                <div class="text-center py-6">
                    <p class="text-gray-500">Tidak ada data yang tersedia.</p>
                </div>
                @endif

                <div class="mt-4 flex justify-center">
                    <ul class="inline-flex items-center -space-x-px">
                        @if ($laporans->onFirstPage())
                        <li class="px-2 py-1 text-gray-400 bg-gray-200 rounded-l-md cursor-not-allowed">
                            <
                                </li>
                                @else
                        <li>
                            <a href="{{ $laporans->appends(request()->query())->previousPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                                <
                            </a>
                        </li>
                        @endif

                        @foreach ($laporans->links()->elements[0] as $page => $url)
                        @if ($laporans->currentPage() == $page)
                        <li class="px-2 py-1 text-white bg-green-600">{{ $page }}</li>
                        @else
                        <li>
                            <a href="{{ $url }}" class="px-2 py-1 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        @if ($laporans->hasMorePages())
                        <li>
                            <a href="{{ $laporans->appends(request()->query())->nextPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">></a>
                        </li>
                        @else
                        <li class="px-2 py-1 text-gray-400 bg-gray-200 rounded-r-md cursor-not-allowed">></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
