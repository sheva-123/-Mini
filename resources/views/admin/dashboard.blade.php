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
                    <h3 class="text-lg font-bold text-gray-800">Monthly Revenue</h3>
                    <canvas id="revenueChart" class="mt-4"></canvas>
                </div>

                <!-- Doughnut Chart -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800">Top Categories</h3>
                    <canvas id="categoryChart" class="mt-4"></canvas>
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
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Revenue',
                    data: [10000, 12000, 14000, 13000, 15000, 16000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        });

        // Category Doughnut Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Clothing', 'Home Appliances', 'Books'],
                datasets: [{
                    data: [300, 200, 150, 100],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Red
                        'rgba(54, 162, 235, 0.6)', // Blue
                        'rgba(75, 192, 192, 0.6)', // Green
                        'rgba(255, 206, 86, 0.6)', // Yellow
                    ],
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        });
    </script>
    @endpush
</x-app-layout>