<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <!-- User Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-8 py-4 md:ml-64">
        <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white">Data Pengguna</h1>
                <p class="text-white text-sm mt-1">Admin | Pengguna</p>
            </div>
        </header>

        <!-- Filter & Search -->
        <div class="flex flex-wrap justify-between items-center gap-4">
            <form action="{{ route('pengguna.index') }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                <input type="text" name="search" placeholder="Cari..." class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200" value="{{ request('search') }}">
                <select name="filter" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Status</option>
                    <option value="true" {{ request('filter') == 'true' ? 'selected' : '' }}>Sudah Punya</option>
                    <option value="false" {{ request('filter') == 'false' ? 'selected' : '' }}>Belum Punya</option>
                    <option value="verif" {{ request('filter') == 'cerif' ? 'selected' : '' }}>Verifikasi</option>
                </select>
                <select name="sort" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200">
                    <option value="">Urutan Data</option>
                    <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                    <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Filter</button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border-collapse">
                    <thead class="text-md text-gray-900 uppercase bg-green-100 border-b">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Pengguna</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3 text-center">Lahan</th>
                            <th class="px-6 py-3 flex justify-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-green-50 transition-all">
                            <td class="px-6 py-4">{{ $users->firstItem() + $loop->index }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-center">
                                @if ($user->pertanian->isEmpty())
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    Belum Diberikan
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Sudah Diberikan
                                </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 flex justify-center gap-2">
                                @if ($user->roles->isEmpty())
                                <form action="{{ route('pengguna.verifikasi', $user->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" onclick="confirmUser(event)"
                                        class=" text-black bg-yellow-300 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                        Verifikasi
                                    </button>
                                </form>
                                @else
                                @if ($user->pertanian->isEmpty())
                                <button type="button" onclick="openModal({{ $user->id }})"
                                    class="bg-green-600 hover:bg-green-800 text-white px-5 py-2.5 rounded-full shadow-md transition-all duration-300 text-sm">
                                    Beri lahan
                                </button>
                                @else
                                <button type="button"
                                    class="bg-green-200 hover:bg-green-200 text-grey-600 px-5 py-2.5 rounded-full text-sm">
                                    Beri lahan
                                </button>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($users->isEmpty())
                <div class="text-center py-6">
                    <p class="text-gray-500">Tidak ada data yang tersedia.</p>
                </div>
                @endif

                <div class="mt-4 flex justify-center">
                    <ul class="inline-flex items-center -space-x-px">
                        @if ($users->onFirstPage())
                        <li class="px-2 py-1 text-gray-400 bg-gray-200 rounded-l-md cursor-not-allowed">
                            <
                                </li>
                                @else
                        <li>
                            <a href="{{ $users->appends(request()->query())->previousPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                                << /a>
                        </li>
                        @endif

                        @foreach ($users->links()->elements[0] as $page => $url)
                        @if ($users->currentPage() == $page)
                        <li class="px-2 py-1 text-white bg-green-600">{{ $page }}</li>
                        @else
                        <li>
                            <a href="{{ $url }}" class="px-2 py-1 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        @if ($users->hasMorePages())
                        <li>
                            <a href="{{ $users->appends(request()->query())->nextPageUrl() }}" class="px-2 py-1 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">></a>
                        </li>
                        @else
                        <li class="px-2 py-1 text-gray-400 bg-gray-200 rounded-r-md cursor-not-allowed">></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Modal Beri Lahan -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-extrabold mb-4">Berikan lahan</h2>
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf

                    <!-- Input hidden untuk user_id -->
                    <input type="hidden" id="modal_user_id" name="user_id">

                    <div class="mb-4">
                        <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Lahan</label>
                        <select id="pertanian_id" name="pertanian_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                            @foreach ($lahan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pertanian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <script>
            function openModal(userId) {
                document.getElementById('modal').classList.remove('hidden');
                document.getElementById('modal_user_id').value = userId;
            }

            function closeModal() {
                document.getElementById('modal').classList.add('hidden');
            }
        </script>

    </div>
</body>

</html>