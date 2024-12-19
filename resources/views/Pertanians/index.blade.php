<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-900">🌱 Daftar Pertanian</h1>
            <p class="text-gray-600 mt-2">Kelola data pertanian Anda dengan mudah dan cepat</p>
        </div>

        <div class="flex justify-end mb-6">
            <a href="{{ route('pertanians.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M5 6h14m-2 12H7" />
                </svg>
                Tambah Pertanian
            </a>
        </div>

        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="table-auto w-full bg-white text-gray-800">
                <thead class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <tr class="text-center">
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Pertanian</th>
                        <th class="px-4 py-2">Lokasi</th>
                        <th class="px-4 py-2">Luas Lahan</th>
                        <th class="px-4 py-2">Dibuat</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pertanians as $pertanian)
                        <tr class="text-center border-b">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pertanian->nama_pertanian }}</td>
                            <td class="px-4 py-2">{{ $pertanian->lokasi_pertanian }}</td>
                            <td class="px-4 py-2">{{ $pertanian->luas_lahan }} ha</td>
                            <td class="px-4 py-2">{{ $pertanian->created_at }}</td>
                            <td class="px-4 py-2 flex justify-center items-center space-x-2">
                                <a href="{{ route('pertanians.edit', $pertanian->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 4.232l4.536 4.536-9 9H6v-4.768l9-9zM9 11l3 3" />
                                    </svg>
                                </a>
                                <form action="{{ route('pertanians.destroy', $pertanian->id) }}" method="POST">
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
