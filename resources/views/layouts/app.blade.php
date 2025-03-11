<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    
</head>

<body class="font-sans antialiased bg-gray-100">
    <nav class="bg-white border-b border-gray-300 fixed w-full z-50 top-0 left-0">
        <div class="flex justify-between items-center px-9 h-20">


            <h2 class="text-2xl font-semibold text-gray-700">Manajemen Pertanian</h2>


        </div>
    </nav>
    <div class="grid grid-cols-[0.5fr_2fr] h-screen mt-20">
        <div>
            <x-sidebar />
        </div>
        <div>
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="">
                {{ $slot }}
            </main>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <script>
        function deleteRecord(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: "Apakah kamu yakin menghapus data ini?",
                text: "Anda tidak dapat mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            });
        }
    </script>
</body>

</html>
