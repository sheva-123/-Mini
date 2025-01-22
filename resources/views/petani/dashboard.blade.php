<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                        <p class="text-2xl font-bold text-blue-600">{{ $plants->count() }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Plantings</h3>
                        <p class="text-2xl font-bold text-green-600">{{ $plantings->count() }}</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Expenses</h3>
                        <p class="text-2xl font-bold text-red-600">Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Tanaman Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Your Plants</h2>
                    @if ($plants->count() > 0)
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
                                    @foreach ($plants as $key => $plant)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">{{ $key + 1 }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $plant->name }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $plant->type }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $plant->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No plants available.</p>
                    @endif
                </div>

                <!-- Penanaman Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Planting Records</h2>
                    @if ($plantings->count() > 0)
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
                                    @foreach ($plantings as $key => $planting)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">{{ $key + 1 }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $planting->plant->name }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $planting->date_planted->format('d-m-Y') }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $planting->location }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No planting records available.</p>
                    @endif
                </div>

                <!-- Pengeluaran Table -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Expenses</h2>
                    <p>Total Expenses: <strong>Rp {{ number_format($totalExpense, 0, ',', '.') }}</strong></p>
                    @if ($expenses->count() > 0)
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
                                    @foreach ($expenses as $key => $expense)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">{{ $key + 1 }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $expense->description }}</td>
                                            <td class="border border-gray-200 px-4 py-2">Rp {{ number_format($expense->amount, 0, ',', '.') }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $expense->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No expenses recorded yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
