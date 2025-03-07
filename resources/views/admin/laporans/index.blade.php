<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Laporan</h1>
                <p class="text-white text-sm mt-1">Admin | Laporan</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table class="w-full text-md text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Lahan</th>
                            <th scope="col" class="px-6 py-3">Lokasi</th>
                            <th scope="col" class="px-6 py-3">Nama Pengguna</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                @foreach ($user->pertanian as $pertanian)
                                {{ $pertanian->nama_pertanian }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($user->pertanian as $pertanian)
                                {{ $pertanian->lokasi_pertanian }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <a href="{{ route('admin.laporans.show', $user->id) }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    <svg fill="none" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title></title>
                                            <path
                                                d="M15,2A8,8,0,0,0,8.69,14.9l-6.4,6.4,1.41,1.41,6.4-6.4A8,8,0,1,0,15,2Zm0,14a6,6,0,1,1,6-6A6,6,0,0,1,15,16Z">
                                            </path>
                                            <rect height="2" width="2" x="14" y="6"></rect>
                                            <rect height="5" width="2" x="14" y="9"></rect>
                                        </g>
                                    </svg>
                                </a>
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
</x-app-layout>