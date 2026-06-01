<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-10">

                <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                    Workshop Dashboard

                </div>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                    Dashboard Overview

                </h1>

                <p class="mt-2 text-sm text-gray-500">

                    Monitor workshop activities, services, and transactions.

                </p>

            </div>

            {{-- Stats --}}
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

                {{-- Customers --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Customers
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">
                        {{ $totalCustomers }}
                    </h2>

                </div>

                {{-- Vehicles --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Vehicles
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">
                        {{ $totalVehicles }}
                    </h2>

                </div>

                {{-- Services --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Services
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">
                        {{ $totalServices }}
                    </h2>

                </div>

                {{-- Service Records --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Service Records
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">
                        {{ $totalServiceRecords }}
                    </h2>

                </div>

            </div>

            {{-- Second Row --}}
            <div class="mt-6 grid gap-6 lg:grid-cols-3">

                {{-- Income --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Income
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-primary">
                        RM {{ number_format($totalIncome, 2) }}
                    </h2>

                </div>

                {{-- Pending --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Pending Services
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-yellow-600">
                        {{ $pendingServices }}
                    </h2>

                </div>

                {{-- Completed --}}
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Completed Services
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-green-600">
                        {{ $completedServices }}
                    </h2>

                </div>

            </div>

            {{-- Recent Transactions --}}
            <div class="mt-8 overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">

                    <h2 class="text-lg font-semibold text-gray-900">

                        Recent Job Orders

                    </h2>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-4">
                                    Vehicle
                                </th>

                                <th class="px-6 py-4">
                                    Customer
                                </th>

                                <th class="px-6 py-4">
                                    Service
                                </th>

                                <th class="px-6 py-4">
                                    Price
                                </th>

                                <th class="px-6 py-4">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($recentRecords as $record)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-medium uppercase text-gray-900">

                                        {{ $record->vehicle->plate_number }}

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-600">

                                        {{ $record->vehicle->customer->full_name }}

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex flex-col gap-2">

                                            @foreach ($record->items as $item)
                                                <div
                                                    class="inline-flex w-fit items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">

                                                    {{ $item->service->service_name }}

                                                    <span class="text-gray-500">

                                                        x{{ $item->quantity }}

                                                    </span>

                                                </div>
                                            @endforeach

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-sm font-semibold text-primary">

                                        RM {{ number_format($record->total_price, 2) }}

                                    </td>

                                    <td class="px-6 py-4">

                                        @if ($record->status == 'completed')
                                            <span
                                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                                Completed

                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                                Pending

                                            </span>
                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">

                                        No recent transactions found.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
