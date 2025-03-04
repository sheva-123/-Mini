<x-app-layout>
    <header class="bg-gradient-to-r from-green-600 to-teal-600 py-6 px-8 shadow-md rounded-lg mb-6 mt-4 mx-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Detail Laporan</h1>
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
                            <th scope="col" class="px-6 py-3">waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->pertanian as $pertanian)
                        @foreach ($pertanian->laporan as $laporan)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $pertanian->nama_pertanian }}</td>
                            <td class="px-6 py-4">{{ $laporan->deskripsi }}</td>
                            <td class="px-6 py-4">{{ $laporan->created_at }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>