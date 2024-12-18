<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-900">🌱 Daftar Pertanian</h1>
            <p class="text-gray-600 mt-2">Kelola data pertanian Anda dengan mudah dan cepat</p>
        </div>

        <div class="flex justify-end mb-6">
            <a href="{{ route('pertanians.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pertanian
            </a>
        </div>

        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="table-auto w-full bg-white text-gray-800">
                <thead class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <tr>
                    <th>ID</th>
                    <th>Nama Pertanian</th>
                    <th>Lokasi</th>
                    <th>Luas Lahan</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertanians as $pertanian)
                    <tr>
                        <td>{{ $pertanian->id }}</td>
                        <td>{{ $pertanian->nama_pertanian }}</td>
                        <td>{{ $pertanian->lokasi_pertanian }}</td>
                        <td>{{ $pertanian->luas_lahan }} ha</td>
                        <td>{{ $pertanian->created_at }}</td>
                        <td>
                            <a href="{{ route('pertanians.edit', $pertanian->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>