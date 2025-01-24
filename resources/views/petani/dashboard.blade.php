<x-usersidebar>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Pengguna
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mb-6">Berikut adalah ringkasan tanaman, penanaman, dan pengeluaran Anda.</p>

                <!-- Kartu Ringkasan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Tanaman</h3>
                        <p class="text-2xl font-bold text-blue-600">12334</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Penanaman</h3>
                        <p class="text-2xl font-bold text-green-600">13243</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Pengeluaran</h3>
                        <p class="text-2xl font-bold text-red-600">Rp 12432</p>
                    </div>
                </div>

                <!-- Tabel Tanaman -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Tanaman Anda</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Nama Tanaman</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Jenis</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Tanggal Ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-200 px-4 py-2">34</td>
                                    <td class="border border-gray-200 px-4 py-2">Mawar</td>
                                    <td class="border border-gray-200 px-4 py-2">Hias</td>
                                    <td class="border border-gray-200 px-4 py-2">20 Januari 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-gray-500">Tidak ada tanaman yang tersedia.</p>
                </div>

                <!-- Tabel Penanaman -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Catatan Penanaman</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Nama Tanaman</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Tanggal Ditanam</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-200 px-4 py-2">123</td>
                                    <td class="border border-gray-200 px-4 py-2">Anggrek</td>
                                    <td class="border border-gray-200 px-4 py-2">15 Januari 2025</td>
                                    <td class="border border-gray-200 px-4 py-2">Kebun Belakang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-gray-500">Belum ada catatan penanaman.</p>
                </div>

                <!-- Tabel Pengeluaran -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Pengeluaran</h2>
                    <p>Total Pengeluaran: <strong>Rp 12,432</strong></p>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Deskripsi</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Jumlah</th>
                                    <th class="border border-gray-200 px-4 py-2 text-left">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-200 px-4 py-2">23</td>
                                    <td class="border border-gray-200 px-4 py-2">Pupuk</td>
                                    <td class="border border-gray-200 px-4 py-2">Rp 50,000</td>
                                    <td class="border border-gray-200 px-4 py-2">18 Januari 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-gray-500">Belum ada pengeluaran yang tercatat.</p>
                </div>
            </div>
        </div>
    </div>
</x-usersidebar>
