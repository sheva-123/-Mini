<x-app-layout>
    <div class="container mx-auto p-4">

        <h1 class="text-2xl font-bold mb-4">Pemanenan</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('pemanenans.index') }}" method="GET" class="mb-4 flex justify-between items-center">
            <div class="flex-1">
                <input type="text" name="cari" value="{{ $cari }}" class="form-input w-full"
                    placeholder="Cari Tanggal Panen">
            </div>
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
        </form>

        <a href="{{ route('pemanenans.create') }}" class="btn btn-success mb-4 inline-block">Tambah Pemanenan</a>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-gray-700">Penanaman</th>
                        <th class="px-4 py-2 border-b text-gray-700">Tanggal Panen</th>
                        <th class="px-4 py-2 border-b text-gray-700">Jumlah Hasil</th>
                        <th class="px-4 py-2 border-b text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemanenans as $pemanenan)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $pemanenan->penanaman->nama }}</td>
                            <td class="px-4 py-2">{{ $pemanenan->tanggal_pemanenan }}</td>
                            <td class="px-4 py-2">{{ $pemanenan->jumlah_hasil }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('pemanenans.edit', $pemanenan) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pemanenans.destroy', $pemanenan) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <!-- Grafik Hasil Panen -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Grafik Hasil Panen</h2>
            <canvas id="grafikPanen" width="400" height="200"></canvas>
        </div>
    </div> --}}

    <!-- Chart.js Script -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikPanen').getContext('2d');
        const data = @json($dataGrafik);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(item => item.tanggal),
                datasets: [{
                    label: 'Hasil Panen (kg)',
                    data: data.map(item => item.total_hasil),
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 128, 0, 0.2)',
                    fill: true,
                    tension: 0.3,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Hasil Panen (kg)'
                        }
                    }
                }
            }
        });
    </script> --}}
</x-app-layout>
