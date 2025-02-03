<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-white w-64 h-screen shadow-lg">
            <div class="mt-6 space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('user.home') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-gauge-simple-high"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <!-- Menu Items -->
                <a href="{{ route('Penanamans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-hand-holding-water"></i>
                    <span class="ml-3">Penanaman</span>
                </a>

                <a href="{{ route('pengeluarans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-wallet"></i>
                    <span class="ml-3">Pengeluaran</span>
                </a>

                <a href="{{ route('pemeliharaans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-tools"></i>
                    <span class="ml-3">Pemeliharaan</span>
                </a>

                <a href="{{ route('pemanenans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-apple-alt"></i>
                    <span class="ml-3">Pemanenan</span>
                </a>

                <a href="{{ route('laporans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                    <i class="fas fa-file-alt"></i>
                    <span class="ml-3">Laporan</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 flex items-center">
                    @csrf
                    <button type="submit" onclick="logout(event)" class="flex items-center w-full text-gray-700 hover:text-red-600">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Remove dropdown related scripts
        document.querySelectorAll('.sidebar-item').forEach(item => {
            const currentUrl = window.location.href;
            if (currentUrl.includes(item.getAttribute('href'))) {
                item.classList.add('bg-green-200');
                item.classList.remove('hover:bg-green-100');
            }
        });

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
    </script>
</body>
</html>