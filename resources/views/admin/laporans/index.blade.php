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
                            <th scope="col" class="px-6 py-3">Nama Pengguna</th>
                            <th scope="col" class="px-6 py-3">Lahan</th>
                            <th scope="col" class="px-6 py-3">Laporan</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">
                                    @if ($user->pertanian->count() > 0)
                                        <ul>
                                            @foreach ($user->pertanian as $pertanian)
                                                <li>{{ $pertanian->nama_pertanian }} -
                                                    {{ $pertanian->lokasi_pertanian }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-red-500">Belum diberikan lahan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($user->pertanian->count() > 0)
                                        <ul>
                                            @foreach ($user->pertanian as $pertanian)
                                                @foreach ($pertanian->laporan as $laporan)
                                                    <li>{{ $laporan->tanggal_laporan }}: {{ $laporan->deskripsi }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-gray-500">Tidak ada laporan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    @foreach ($user->pertanian as $pertanian)
                                        @foreach ($pertanian->laporan as $laporan)
                                            <a href="{{ route('admin.laporans.show', $laporan->id) }}"
                                                class="text-blue-500 hover:text-blue-700">
                                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                                    <path d="M15,2A8,8,0,0,0,8.69,14.9l-6.4,6.4,1.41,1.41,6.4-6.4A8,8,0,1,0,15,2Zm0,14a6,6,0,1,1,6-6A6,6,0,0,1,15,16Z"></path>
                                                    <rect height="2" width="2" x="14" y="6"></rect>
                                                    <rect height="5" width="2" x="14" y="9"></rect>
                                                </svg>
                                            </a>
                                        @endforeach
                                    @endforeach
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
