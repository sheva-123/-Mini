<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-900">🌱 Daftar Pemeliharaan</h1>
            <p class="text-gray-600 mt-2">Kelola data pemeliharaan Anda dengan mudah dan cepat</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('pemeliharaans.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pemeliharaan
            </a>
        </div>

        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="table-auto w-full bg-white text-gray-800">
                <thead class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <tr class="text-center">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Penanaman</th>
                        <th class="px-4 py-2">Tanggal Pemeliharaan</th>
                        <th class="px-4 py-2">Jenis Pemeliharaan</th>
                        <th class="px-4 py-2">Biaya</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemeliharaans as $pemeliharaan)
                        <tr class="text-center border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $pemeliharaan->id }}</td>
                            <td class="px-4 py-2">{{ $pemeliharaan->penanaman->nama ?? 'Tidak diketahui' }}</td>
                            <td class="px-4 py-2">{{ $pemeliharaan->tanggal_pemeliharaan }}</td>
                            <td class="px-4 py-2">{{ $pemeliharaan->jenis_pemeliharaan }}</td>
                            <td class="px-4 py-2">{{ number_format($pemeliharaan->biaya, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 flex justify-center items-center space-x-2">
                                <a href="{{ route('pemeliharaans.edit', $pemeliharaan) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                    </svg>
                                </a>
                                <form action="{{ route('pemeliharaans.destroy', $pemeliharaan) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
