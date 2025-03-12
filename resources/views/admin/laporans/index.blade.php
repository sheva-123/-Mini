<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Laporan</h1>
                <p class="text-white text-sm mt-1">Admin | Laporan</p>
            </div>
        </div>
    </header>

    <div class="flex flex-wrap justify-between items-center gap-4">
        <form action="{{ route('admin.laporans.index') }}" method="get" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
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
    </div>

    <div class="container mx-auto px-4">
        <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="relative overflow-x-auto">
                <table class="w-full text-md text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Pengguna</th>
                            <th scope="col" class="px-6 py-3 text-center">Lahan</th>
                            <th scope="col" class="px-6 py-3 text-center">Penanaman</th>
                            <th scope="col" class="px-6 py-3 text-center">Tanaman</th>
                            <th scope="col" class="px-6 py-3 text-center">Status Panen</th>
                            <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $user)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ optional($user->pertanian->users->first())->name }}</td>
                            <td class="px-6 py-4 text-center">
                                {{ $user->pertanian->nama_pertanian }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $user->nama }}
                            </td>
                            <td class="px-6 py-4 text-center">{{ $user->tanaman->nama_tanaman }}</td>
                            <td class="px-6 py-4 text-center">@foreach ($user->pemanenan as $panen)
                                <span class="{{ $panen->status_panen == 'Berhasil' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $panen->status_panen }}
                                </span>@if (!$loop->last), @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <a href="{{ route('admin.laporans.detail', $user->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href=""
                                    class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
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
            </div>
        </div>
    </div>
</x-app-layout>