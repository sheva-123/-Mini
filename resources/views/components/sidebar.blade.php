<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Agri Management Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50">

    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-green-700 text-white w-64 h-[530px] fixed shadow-lg rounded-lg px-4 py-6 ml-4 mt-4">
            <h2 class="text-xl font-semibold mb-8 text-center text-white">Manajemen Pertanian</h2>

            <div class="space-y-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-gauge-simple-high"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <a href="{{ route('tanamans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-leaf"></i>
                    <span class="ml-3">Tanaman</span>
                </a>

                <a href="{{ route('pertanians.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-house-chimney-window"></i>
                    <span class="ml-3">Pertanian</span>
                </a>

                <a href="{{ route('pengguna.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-user"></i>
                    <span class="ml-3">Pengguna</span>
                </a>
                <a href="{{ route('logs.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-address-book"></i>
                    <span class="ml-3">Log Pengguna</span>
                </a>
                <a href="{{ route('admin.laporans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-file-alt"></i>
                    <span class="ml-3">Laporan</span>
                </a>


                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 flex items-center">
                    @csrf
                    <button type="submit" onclick="logout(event)"
                        class="flex items-center text-white hover:text-red-500">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->

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

    <!-- Scripts -->
    <script>
        // Add event listener to handle the active state of sidebar items
        document.querySelectorAll('.sidebar-item').forEach(item => {
            const currentUrl = window.location.href;
            if (currentUrl.includes(item.getAttribute('href'))) {
                item.classList.add('bg-green-600');
                item.classList.remove('hover:bg-green-600');
            }
        });

        // Logout confirmation
        function logout(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: "Apakah kamu yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, keluar!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // Verification confirmation
        function confirmUser(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: "Apakah kamu yakin ingin Verifikasi user ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Verifikasi!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

</body>

</html>