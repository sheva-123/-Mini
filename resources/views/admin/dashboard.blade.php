<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
                <p class="text-sm text-gray-500">Selamat Datang Kembali!, selamat beraktifitas.</p>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Jumlah Pengguna</h3>
                    <p class="mt-2 text-4xl font-bold">{{ $users->count() }}</p>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Jumlah Lahan</h3>
                    <p class="mt-2 text-4xl font-bold">{{ $lahan->count() }}</p>
                </div>
                <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Jumlah Tanaman</h3>
                    <p class="mt-2 text-4xl font-bold">{{ $tanaman->count() }}</p>
                </div>
            </div>

            <!-- Grafik -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Line Chart -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800">Pemeliharaan Bulanan</h3>
                    <canvas id="pemeliharaanChart" class="mt-4"></canvas>
                </div>

                <!-- Doughnut Chart -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800">Pemanenan Bulanan</h3>
                    <canvas id="pemanenanChart" class="mt-4"></canvas>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-800">Aktifitas Pengguna</h3>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full bg-white border">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Pengguna</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aktifitas</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Deskripsi</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activityLogs as $log)
                            <tr class="border-t">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $log->user->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $log->activity }}</td>
                                <td class="px-4 py-2 text-sm text-green-500">{{ $log->description }}</td>
                                <td class="px-4 py-2 text-sm text-yellow-500">{{ $log->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue Line Chart
        fetch('/api/pemeliharaan-bulanan')
            .then(response => response.json())
            .then(data => {
                const months = data.map(d => d.month);
                const pemeliharaan = data.map(d => d.hasil_pemeliharaan);

                const ctx = document.getElementById('pemeliharaanChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Total Pemeliharaan',
                            data: pemeliharaan,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    @endpush
</x-app-layout>