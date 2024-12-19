    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">


    <!-- Barra lateral -->
    <div id="sideNav" class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none">
        <!-- Items -->
        <div class="p-4 space-y-4">
            <!-- Inicio -->

            <a href="{{ route('dashboard') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('dashboard') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('pertanians.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('Pertanians.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Pertanians</span>
            </a>
            <a href="{{ route('tanamans.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('Tanaamans.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Tanamans</span>
            </a>
            <a href="{{ route('pemanenans.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('pemanenans.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Pemanenan</span>
            </a>
            <a href="{{ route('pengeluarans.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('pengeluarans.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Pengeluaran</span>
            <a href="{{ route('pemeliharaans.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('pemeliharaans.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Pemeliharaan</span>
            <a href="{{ route('Penanamans.index') }}" class="px-4 py-3 flex items-center space-x-4 group {{ request()->routeIs('pemeliharaans.*') ? 'rounded-lg text-white bg-gradient-to-r from-sky-600 to-cyan-400' :  'rounded-md text-gray-500 ' }}">
                <i class="fas fa-wallet"></i>
                <span>Penanaman</span>
            </a>
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
