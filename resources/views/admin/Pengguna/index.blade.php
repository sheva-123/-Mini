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
                <select name="filter" class="p-3 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 appearance-none w-full" onchange="this.form.submit()">
                    <option value="all">Semua</option>
                    <option value="false">Belum Diberikan Lahan</option>
                    <option value="true">Sudah Diberikan Lahan</option>
                    <option value="verif">Verifikasi</option>
                </select>
            </form>

            <!-- Search Input (Now Second) -->
            <form action="{{ route('pengguna.index') }}" method="GET" class="flex gap-2 w-full">
                <input type="text" name="search" placeholder="🔍 Cari pengguna..."
                    value="{{ request()->get('search') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </form>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Verifikasi Data Button -->
            <button type="button" onclick="openModalVerifikasi()"
                class="bg-green-600 hover:bg-green-800 text-white px-5 py-3 rounded-lg shadow-md transition-all duration-300 flex items-center gap-2 text-sm">
                ✔️ Verifikasi
            </button>

            <!-- Add Data Button -->
            <button type="button" onclick="openModal()"
                class="bg-green-600 hover:bg-green-800 text-white px-5 py-3 rounded-lg shadow-md transition-all duration-300 flex items-center gap-2 text-sm">
                ➕ Tambah
            </button>
        </div>
    </div>

    <!-- Modal Verifikasi -->
    <div id="modalverifikasi" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-extrabold mb-4">Verifikasi Pengguna</h2>
            <p class="text-gray-600 mb-4">Pilih pengguna yang belum memiliki role dan membutuhkan verifikasi:</p>

            <div class="mb-4 max-h-60 overflow-y-auto border border-gray-300 rounded-md p-2">
                <ul>
                    @foreach ($userVerif as $us)
                    <li class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-800">{{ $us->name }} ({{ $us->email }})</span>
                        <form action="{{ route('pengguna.verifikasi', $us->id) }}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <button
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm">
                                Verifikasi
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
                <button type="button" onclick="closeModalVerifikasi()"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Add User -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-extrabold mb-4">Tambah Data Pengguna</h2>
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                    <select id="user_id" name="user_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        @foreach ($addUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
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
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300">
                        Simpan
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
                            <th class="px-6 py-3">Verifikasi</th>
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
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    Belum Diberikan
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Sudah Diberikan
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->roles->isEmpty())
                                <form action="{{ route('pengguna.verifikasi', $us->id) }}" gmethod="GET" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Verifikasi</button>
                                </form>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function openModalVerifikasi() {
            const modal = document.getElementById('modalverifikasi');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModalVerifikasi() {
            const modal = document.getElementById('modalverifikasi');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function openModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

</x-app-layout>