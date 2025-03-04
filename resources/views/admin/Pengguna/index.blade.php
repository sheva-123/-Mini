<x-app-layout>
    <header class="bg-gradient-to-r from-green-700 to-lime-500 py-6 px-8 shadow-lg rounded-lg mb-6 mt-4 mx-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold">Data Pengguna</h1>
                <p class="text-sm mt-1">Admin | Manajemen Pengguna</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex w-2/2 gap-3">
            <form action="{{ route('pengguna.index') }}" method="get">
                <select name="filter"
                    class="p-3 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-gray-500 appearance-none w-full"
                    onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="false">Belum Diberikan</option>
                    <option value="true">Sudah Diberikan</option>
                    <option value="verif">Verifikasi</option>
                </select>
            </form>

            <!-- Search Input (Now Second) -->
            <div class="flex border-1 border-gray-200 rounded-md focus-within:ring-2 ring-gray-500">
                <form action="{{ route('pengguna.index') }}" method="GET" class="flex gap-2 w-full">
                    <input type="text" name="search" placeholder=" Cari pengguna..."
                        value="{{ request()->get('search') }}"
                        class="w-[150px] p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-gray-500">
                    <button type="submit" class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                        <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
            </div>
            </form>
        </div>
    </div>


    <!-- User Table -->
    <div class="container mx-auto mt-8 px-6">
        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border-collapse">
                    <thead class="text-md text-gray-900 uppercase bg-green-100 border-b">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Pengguna</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Lahan</th>
                            <th class="px-6 py-3 flex justify-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-green-50 transition-all">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
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
                                    <button type="submit"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                        Verifikasi
                                    </button>
                                </form>
                                @endif

                                @if ($user->pertanian->isEmpty())
                                <button type="button" onclick="openModal({{ $user->id }})"
                                    class="bg-green-600 hover:bg-green-800 text-white px-5 py-2.5 rounded-full shadow-md transition-all duration-300 text-sm">
                                    Beri lahan
                                </button>
                                @else
                                <button type="button"
                                    class="bg-green-200 hover:bg-green-200 text-grey px-5 py-2.5 rounded-full text-sm">
                                    Beri lahan
                                </button>
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


</x-app-layout>
