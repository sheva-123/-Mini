<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-900">🌱 Daftar Tanaman</h1>
            <p class="text-gray-600 mt-2">Kelola data tanaman Anda dengan mudah dan cepat</p>
        </div>

        <div class="flex justify-end mb-6">
            <a href="{{ route('tanamans.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Tanaman
            </a>
        </div>

        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="table-auto w-full bg-white text-gray-800">
                <thead class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nama Tanaman</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($tanamans as $tanaman)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">{{ $tanaman->id }}</td>
                            <td class="px-6 py-4">{{ $tanaman->nama_tanaman }}</td>
                            <td class="px-6 py-4">{{ $tanaman->jenis }}</td>
                            <td class="px-6 py-4">{{ $tanaman->deskripsi }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('tanamans.edit', $tanaman) }}" class="inline-block bg-yellow-400 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-500 transition-transform transform hover:scale-105">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            @if(session('success'))
                <div class="p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
