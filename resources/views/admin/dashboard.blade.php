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
    <style>
        #donut .apexcharts-legend {
            position: absolute !important;
            bottom: -185px !important;
            top: auto !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            display: flex !important;
            flex-direction: row !important;
            justify-content: center !important;
            width: 100% !important;
            padding-top: 10px !important;
        }

        #donut .apexcharts-legend-series {
            margin: 0 8px !important;
        }

        #donut .apexcharts-svg {
            height: 368px;
            width: 445px;
        }

        #donut .apexcharts-inner .apexcharts-graphical {
            transform: translate(100, 80);
        }

        #donut .apexcharts-pie {
            transform: scale(2.5) !important;
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(60px, -5px) scale(2.5) !important;
        }

        /* Posisikan legend di bawah */
        .donut-chart-container .apexcharts-legend {
            position: absolute !important;
            bottom: 0 !important;
            top: auto !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-wrap">
    <!-- User Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-3 py-1 md:ml-64">
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white sm:rounded-lg p-6 py-6">
                    <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                    <p class="text-gray-600 mb-3">Selamat Datang Kembali!, selamat beraktifitas.</p>
                </div>

                <div class="mt-6 py-6" style="display: flex; flex-wrap: wrap; margin: -12px;">
                    <div style="width: 33.33%; padding: 12px; box-sizing: border-box;">
                        <div class="bg-leftCardAdmin rounded-lg p-6">
                            <h3 class="text-lg text-black font-semibold">Jumlah Pengguna</h3>
                            <p class="mt-2 text-4xl text-leftFont font-bold">{{ $users->count() }}</p>
                        </div>
                    </div>
                    <div style="width: 33.33%; padding: 12px; box-sizing: border-box;">
                        <div class="bg-midCardAdmin rounded-lg p-6">
                            <h3 class="text-lg text-black font-semibold">Jumlah Lahan</h3>
                            <p class="mt-2 text-4xl text-midFont font-bold">{{ $lahan->count() }}</p>
                        </div>
                    </div>
                    <div style="width: 33.33%; padding: 12px; box-sizing: border-box;">
                        <div class="bg-rightCardAdmin rounded-lg p-6">
                            <h3 class="text-lg text-black font-semibold">Jumlah Tanaman</h3>
                            <p class="mt-2 text-4xl text-rightFont font-bold">{{ $tanaman->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6" style="display: flex; flex-wrap: wrap; margin: -12px;">
                    <div style="width: 60%; padding: 12px; box-sizing: border-box;">
                        <div id="donat" class="bg-white rounded-lg pt-8 py-2 px-6 w-full max-w-5xl h-md md:shadow-md">
                            {!! $panenTanamanChart->container() !!}
                        </div>
                    </div>
                    <div style="width: 40%; padding: 12px; box-sizing: border-box;">
                        <div id="donut" class="bg-white rounded-lg py-6 px-3 w-md h-md md:shadow-md" style="height: 395px;">
                            {!! $semuaJumlahChart->container() !!}
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