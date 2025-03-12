<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-green-700 text-white w-64 h-[580px] fixed shadow-lg rounded-lg px-4 py-6 ml-4 mt-4 overflow-y-auto">
            <!-- Profile Section -->
            <div class="flex items-center space-x-4 mb-6">
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p class="text-sm">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <h2 class="text-2xl font-semibold mb-8 text-center text-white">Agri Management</h2>
            <!-- Sidebar Menu Items -->
            <div class="space-y-4">
                <a href="{{ route('user.home') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-gauge-simple-high"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <a href="{{ route('penanamans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-hand-holding-water"></i>
                    <span class="ml-3">Penanaman</span>
                </a>

                <a href="{{ route('pemeliharaans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-tools"></i>
                    <span class="ml-3">Pemeliharaan</span>
                </a>

                <a href="{{ route('pengeluarans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-wallet"></i>
                    <span class="ml-3">Pengeluaran</span>
                </a>
                
                <a href="{{ route('pemanenans.index') }}"
                    class="sidebar-item px-4 py-2 flex items-center text-white hover:bg-green-600 rounded-md transition">
                    <i class="fas fa-apple-alt"></i>
                    <span class="ml-3">Pemanenan</span>
                </a>

                <a href="{{ route('laporans.index') }}"
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
    </div>

    <!-- Scripts -->

    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('
            success ') }}',
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
            title: '{{ session('
            error ') }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    <script>
        // Highlight the active sidebar item
        document.querySelectorAll('.sidebar-item').forEach(item => {
            const currentUrl = window.location.href;
            if (currentUrl.includes(item.getAttribute('href'))) {
                item.classList.add('bg-green-600');
                item.classList.remove('hover:bg-green-600');
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