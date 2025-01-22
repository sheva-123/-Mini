<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            te
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mb-6">Here is an overview of your plants, plantings, and expenses.</p>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Plants</h3>
                        <p class="text-2xl font-bold text-blue-600">12334</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Plantings</h3>
                        <p class="text-2xl font-bold text-green-600">13243</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Expenses</h3>
                        <p class="text-2xl font-bold text-red-600">Rp 12432</p>
                    </div>
                </div>

                <!-- Tanaman Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Your Plants</h2>
                    
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Plant Name</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Type</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Date Added</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">34</td>
                                            <td class="border border-gray-200 px-4 py-2">fsg</td>
                                            <td class="border border-gray-200 px-4 py-2">fdfb</td>
                                            <td class="border border-gray-200 px-4 py-2">wefg</td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        <p class="text-gray-500">No plants available.</p>
                    
                </div>

                <!-- Penanaman Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Planting Records</h2>
                    
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Plant Name</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Date Planted</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">123</td>
                                            <td class="border border-gray-200 px-4 py-2">dfsg</td>
                                            <td class="border border-gray-200 px-4 py-2">rfg</td>
                                            <td class="border border-gray-200 px-4 py-2">df</td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        <p class="text-gray-500">No planting records available.</p>
                    
                </div>

                <!-- Pengeluaran Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Expenses</h2>
                    <p>Total Expenses: <strong>Rp </strong></p>
                    
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Description</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Amount</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">23</td>
                                            <td class="border border-gray-200 px-4 py-2">dc</td>
                                            <td class="border border-gray-200 px-4 py-2">Rp dsd</td>
                                            <td class="border border-gray-200 px-4 py-2">ddv</td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        <p class="text-gray-500">No expenses recorded yet.</p>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
