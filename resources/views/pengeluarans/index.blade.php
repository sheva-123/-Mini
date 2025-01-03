<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-900">💸 Daftar Pengeluaran</h1>
            <p class="text-gray-600 mt-2">Kelola data pengeluaran Anda dengan mudah dan cepat</p>
        </div>

        <div class="flex justify-end mb-6">
            <a href="{{ route('pengeluarans.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M5 6h14m-2 12H7" />
                </svg>
                Tambah Pengeluaran
            </a>
        </div>

         <!-- Form Pencarian -->
         <form action="{{ route('pengeluarans.index') }}" method="GET" class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
            <div class="flex-1 mr-2">
                <input type="text" name="cari" value="{{ request('cari') }}"
                       class="form-input w-full border border-gray-300 rounded-lg p-2"
                       placeholder="Cari Tanggal Pengeluaran">
            </div>

        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="table-auto w-full bg-white text-gray-800">
                <thead class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <tr class="text-center">
                        <th class="px-4 py-2">Pertanian</th>
                        <th class="px-4 py-2">Tanggal Pengeluaran</th>
                        <th class="px-4 py-2">Jenis Pengeluaran</th>
                        <th class="px-4 py-2">Biaya</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluarans as $pengeluaran)
                    <tr class="text-center border-b">
                            <td class="px-4 py-2">{{ $pengeluaran->pertanian->nama }}</td>
                            <td class="px-4 py-2">{{ $pengeluaran->tanggal_pengeluaran }}</td>
                            <td class="px-4 py-2">{{ $pengeluaran->jenis_pengeluaran }}</td>
                            <td class="px-4 py-2">{{ $pengeluaran->biaya }}</td>
                            <td class="px-4 py-2 flex justify-center items-center space-x-2">
                                <a href="{{ route('pengeluarans.edit', $pengeluaran) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                    </svg>
                                </a>
                                <form action="{{ route('pengeluarans.destroy', $pertanian->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
