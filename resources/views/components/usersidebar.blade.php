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

                <!-- Dropdown Menu -->
                <div id="menuDropdownContainer" class="relative">
                    <button
                        onclick="toggleDropdown()"
                        id="menuButton"
                        class="w-full px-4 py-2 flex items-center justify-between text-gray-700 hover:bg-green-100 hover:text-green-600 transition">
                        <div class="flex items-center">
                            <i class="fas fa-list"></i>
                            <span class="ml-3">Menu</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="menuDropdown" class="hidden mt-2 bg-white border border-gray-200 rounded-md shadow-lg">
                        <a href="{{ route('tanamans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-seedling"></i>
                            <span class="ml-2">Tanaman</span>
                        </a>
                        <a href="{{ route('Penanamans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-hand-holding-water"></i>
                            <span class="ml-2">Penanaman</span>
                        </a>
                        <a href="{{ route('pengeluarans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-wallet"></i>
                            <span class="ml-2">Pengeluaran</span>
                        </a>
                        <a href="{{ route('pemeliharaans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-wallet"></i>
                            <span class="ml-2">Pemeliharaan</span>
                        </a>
                        <a href="{{ route('pemanenans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-wallet"></i>
                            <span class="ml-2">Pemanenans</span>
                        </a>
                        <a href="{{ route('laporans.index') }}"
                            class="menu-item sidebar-item block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-600">
                            <i class="fas fa-wallet"></i>
                            <span class="ml-2">Laporan</span>
                        </a>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 flex items-center">
                    @csrf
                    <button type="submit" onclick="logout(event)" class="flex items-center text-gray-700 hover:text-red-600">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        {{-- <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-semibold text-gray-700">Konten Utama</h1>
        </div> --}}
    </div>

    <!-- Scripts -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('menuDropdown');
            const button = document.getElementById('menuButton');
            const isOpen = dropdown.classList.contains('hidden');

            dropdown.classList.toggle('hidden', !isOpen);

            if (isOpen) {
                button.classList.add('bg-green-100');
                button.classList.remove('hover:bg-green-100');
            } else {
                button.classList.remove('bg-green-100');
                button.classList.add('hover:bg-green-100');
            }

            localStorage.setItem('dropdownState', isOpen ? 'true' : 'false');
        }

        document.addEventListener("DOMContentLoaded", function () {
            const dropdown = document.getElementById('menuDropdown');
            const button = document.getElementById('menuButton');
            const isOpen = localStorage.getItem('dropdownState') === 'true';

            if (isOpen) {
                dropdown.classList.remove('hidden');
                button.classList.add('bg-green-100');
                button.classList.remove('hover:bg-green-100');
            }
        });

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
 