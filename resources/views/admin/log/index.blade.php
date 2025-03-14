<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Pengguna</title>
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
                <h1 class="text-2xl font-bold text-white">Log Aktifitas Pengguna</h1>
                <p class="text-white text-sm mt-1">Admin | Log Pengguna</p>
            </div>
        </header>

        <div class="px-6 flex flex-wrap justify-between items-center gap-4">
            <form action="{{ route('logs.index') }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                <input type="text" name="search" placeholder="Cari..." class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('search') }}">
                <select name="filter" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Semua Aktifitas</option>
                    <option value="Tambah" {{ request('filter') == 'Tambah' ? 'selected' : '' }}>Tambah Data</option>
                    <option value="Edit" {{ request('filter') == 'Edit' ? 'selected' : '' }}>Edit Data</option>
                    <option value="Log in" {{ request('filter') == 'Login' ? 'selected' : '' }}>Login</option>
                    <option value="Log out" {{ request('filter') == 'Logout' ? 'selected' : '' }}>Logout</option>
                    <option value="Register" {{ request('filter') == 'Register' ? 'selected' : '' }}>Register</option>
                </select>
                <select name="sort" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Urutan Data</option>
                    <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                    <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Filter</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="mt-6 mx-6 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800">Aktifitas Pengguna</h3>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Pengguna</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Aktifitas</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Deskripsi</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activityLogs as $log)
                        <tr class="border-t">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $log->user->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $log->activity }}</td>
                            <td class="px-4 py-2 text-sm text-green-500">{{ $log->description }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-500">{{ $log->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($activityLogs->isEmpty())
                <div class="text-center py-6">
                    <p class="text-gray-500">Tidak ada data.</p>
                </div>
                @endif

                <div class="mt-4 flex justify-center">
                    <ul class="inline-flex items-center -space-x-px">
                        @if ($activityLogs->onFirstPage())
                        <li class="px-2 py-1 text-gray-400 bg-gray-200 rounded-l-md cursor-not-allowed">
                            <
                                </li>
                                @else
                        <li>
                            <a href="{{ $activityLogs->appends(request()->query())->previousPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                                <
                            </a>
                        </li>
                        @endif

                        @foreach ($activityLogs->links()->elements[0] as $page => $url)
                        @if ($activityLogs->currentPage() == $page)
                        <li class="px-2 py-1 text-white bg-green-600">{{ $page }}</li>
                        @else
                        <li>
                            <a href="{{ $url }}" class="px-2 py-1 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        @if ($activityLogs->hasMorePages())
                        <li>
                            <a href="{{ $activityLogs->appends(request()->query())->nextPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">></a>
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