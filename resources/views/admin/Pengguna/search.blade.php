{{-- <x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-3 mt-4 mr-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Pengguna</h1>
                <p class="text-white text-sm mt-1">Admin | Pengguna</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-4 pr-3 flex justify-between items-center space-x-2">
        <div class="flex items-center space-x-2">
            <!-- Search Input -->
            <form action="{{ route('pengguna.search') }}" method="GET">
                <input type="text" name="keyword" id="search" placeholder="Cari pengguna..."
                    class="p-2 border border-gray-300 rounded-md shadow-sm w-45">
            </form>

            <!-- Filter by Lahan Dropdown -->
            <select id="filterLahan" class="p-2 border border-gray-300 rounded-md shadow-sm">
                <option value="">Filter berdasarkan Lahan</option>
                @foreach ($lahan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_pertanian }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Tombol Tambah Data Petani -->
            <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah Data Petani
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4">Tambah Data Petani</h2>
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                    <select id="user_id" name="user_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        @foreach ($addUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="pertanian_id" class="block text-sm font-medium text-gray-700">Lahan</label>
                    <select id="pertanian_id" name="pertanian_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        @foreach ($lahan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_pertanian }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mx-auto mt-8 pr-3">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table class="w-full text-md text-left rtl:text-right text-gray-500" id="userTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Pengguna</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Lahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
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
</x-app-layout> --}}
