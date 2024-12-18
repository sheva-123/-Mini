<aside x-data="{ open: false }" class="bg-white border-r border-gray-100 w-59 min-h-screen flex flex-col">
    <!-- Sidebar Header -->
    <div class="h-16 flex items-center justify-center bg-gray-100 border-b border-gray-200">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="mt-4 flex-1">
        <ul class="space-y-4 px-14">
            <!-- Dashboard Link -->
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Dashboard') }}</span>
                </x-nav-link>
            </li>

            <!-- Farms Link -->
            <li>
                <x-nav-link :href="route('farms.index')" :active="request()->routeIs('farms.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Pertanian') }}</span>
                </x-nav-link>
            </li>

            <!-- Crops Link -->
            <li>
                <x-nav-link :href="route('crops.index')" :active="request()->routeIs('crops.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Tanaman') }}</span>
                </x-nav-link>
            </li>

            <!-- Plantings Link -->
            <li>
                <x-nav-link :href="route('plantings.index')" :active="request()->routeIs('plantings.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Penanaman') }}</span>
                </x-nav-link>
            </li>

            <!-- Maintenances Link -->
            <li>
                <x-nav-link :href="route('maintenances.index')" :active="request()->routeIs('maintenances.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Pemeliharaan') }}</span>
                </x-nav-link>
            </li>

            <!-- Harvests Link -->
            <li>
                <x-nav-link :href="route('pemanenans.index')" :active="request()->routeIs('pemanenans.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Pemanenan') }}</span>
                </x-nav-link>
            </li>

            <!-- Expenses Link -->
            <li>
                <x-nav-link :href="route('pengeluarans.index')" :active="request()->routeIs('pengeluarans.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Pengeluaran') }}</span>
                </x-nav-link>
            </li>

            <!-- Reports Link -->
            <li>
                <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.*')" class="flex items-center space-x-1">
                    <span class="text-gray-500">
                        <!-- Add an icon if needed -->
                    </span>
                    <span>{{ __('Laporan') }}</span>
                </x-nav-link>
            </li>
        </ul>
    </nav>

    <!-- Logout Link at the Bottom -->
    <div class="px-10 pb-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center space-x-3 text-red-500 hover:text-red-700">
                <span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                    </svg>
                </span>
                <span>{{ __('Log Out') }}</span>
            </x-nav-link>
        </form>
    </div>
</aside>
