<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <!-- User Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-3 py-1 md:ml-64">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-600 mb-6">Selamat Datang Kembali!, selamat beraktifitas.</p>
                    <!-- Statistik Cards -->
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
                    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Menambahkan padding dan lebar penuh untuk chart berdampingan -->
                        <div class="rounded-lg py-6 px-6 w-full h-full">
                            {!! $semuaJumlahChart->container() !!}
                        </div>

                        <div class="rounded-lg py-6 px-6 w-full h-full">
                            {!! $panenTanamanChart->container() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ $semuaJumlahChart->cdn() }}"></script>
    {{ $semuaJumlahChart->script() }}

    <script src="{{ $panenTanamanChart->cdn() }}"></script>
    {{ $panenTanamanChart->script() }}
</body>

</html>