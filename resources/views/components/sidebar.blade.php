    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css>



    <div id="sideNav" class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none">

        <div class="p-4 space-y-2 pt-12 text-md">


            <a href="{{ route('dashboard') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('dashboard') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-gauge-simple-high"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('pertanians.index') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('pertanians.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-house-chimney-window"></i>
                <span>Pertanians</span>
            </a>
            <a href="{{ route('tanamans.index') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('tanamans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-seedling"></i>
                <span>Tanaman</span>
            </a>
            <a href="{{ route('Penanamans.index') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('Penanamans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-seedling"></i>
                <span>Penanaman</span>
            </a>
            <a href="{{ route('pemanenans.index') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('pemanenans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-tractor"></i>
                <span>Pemanenan</span>
            </a>
            <a href="{{ route('pengeluarans.index') }}"
                class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('pengeluarans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Pengeluaran</span>
                <a href="{{ route('pemeliharaans.index') }}"
                    class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('pemeliharaans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                    <i class="fas fa-hand-holding-water"></i>
                    <span>Pemeliharaan</span>
                    <a href="{{ route('laporans.index') }}"
                        class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('laporans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Laporan</span>
                    </a>
                    <a href=""
                        class="px-4 py-2 flex items-center space-x-4 group {{ request()->routeIs('laporans.*') ? 'rounded-lg text-white bg-green-600' : 'rounded-md text-gray-500 ' }}">
                        <i class="fas fa-user"></i>
                        <span>Pengguna</span>
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}"
                        class="px-4 py-2 flex items-center space-x-4 group">
                        @csrf
                        <button type="submit" onclick="logout(event)"
                            class="flex items-center space-x-4 text-gray-500 hover:text-red-600">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    <script>
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
                                    form.submit()
                                }
                            });
                        }
                    </script>
        </div>
    </div>

    <!-- Script  -->
    <script>
        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle('hidden');
        });
    </script>
