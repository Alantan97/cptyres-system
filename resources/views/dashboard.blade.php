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
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Total Customers

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-cyan-600">

                                {{ $totalCustomers }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                        </div>

                    </div>

                </div>

                {{-- Vehicles --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Total Vehicles

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-blue-600">

                                {{ $totalVehicles }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="size-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 003 0m-3 0h3m6-6H3m15 6a1.5 1.5 0 003 0m-3 0a1.5 1.5 0 01-3 0m3 0h-3m-6-6l1.5-4.5h9l1.5 4.5" />

                            </svg>

                        </div>

                    </div>

                </div>

                {{-- Services --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Total Services

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-violet-600">

                                {{ $totalServices }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="size-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.121 2.121 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-2.496m-2.496 2.496L7.5 19.5m6.416-6.416l-4.248-4.248m0 0L5.75 5.25m3.918 3.586L19.5 5.25" />

                            </svg>

                        </div>

                    </div>

                </div>

                {{-- Service Records --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Job Orders

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-emerald-600">

                                {{ $totalServiceRecords }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="size-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6M7.5 4.5h9A2.25 2.25 0 0118.75 6.75v10.5A2.25 2.25 0 0116.5 19.5h-9A2.25 2.25 0 015.25 17.25V6.75A2.25 2.25 0 017.5 4.5z" />

                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Service Reminders --}}
            <div class="mt-8 overflow-hidden rounded-3xl border border-orange-100 bg-white shadow-sm">

                <div class="flex justify-between border-b border-orange-100 bg-orange-50 px-8 py-5">

                    <div>

                        <h2 class="text-xl font-bold text-orange-700">

                            Service Reminders

                        </h2>

                        <p class="mt-1 text-sm text-orange-600">

                            Vehicles that may require servicing soon.

                        </p>

                    </div>

                    <div
                        class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-orange-100 text-orange-600">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-7 w-7">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9.303 3.376c.866 1.5-.217 3.374-1.95 3.374H4.647c-1.733 0-2.816-1.874-1.95-3.374L10.05 3.374c.866-1.5 3.034-1.5 3.9 0l7.353 12.752zM12 16.5h.008v.008H12v-.008z" />

                        </svg>

                    </div>

                </div>

                <div class="divide-y divide-gray-100">

                    @forelse ($dueVehicles as $record)
                        <div class="flex items-center justify-between px-8 py-5 transition hover:bg-gray-50">

                            <div>

                                <div class="font-semibold text-gray-900">

                                    {{ $record->vehicle->plate_number }}

                                </div>

                                <div class="mt-1 text-sm text-gray-500">

                                    {{ $record->vehicle->customer->full_name }}

                                </div>

                            </div>

                            <div class="text-right">

                                <div class="text-sm font-medium text-orange-600">

                                    Last Service

                                </div>

                                <div class="mt-1 text-sm text-gray-500">

                                    {{ \Carbon\Carbon::parse($record->service_date)->format('d M Y') }}

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="px-8 py-10 text-center text-sm text-gray-500">

                            No vehicles currently require servicing.

                        </div>
                    @endforelse

                </div>

            </div>

            {{-- Second Row --}}

            <div class="mt-6 grid gap-6 lg:grid-cols-3">

                {{-- Income --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Total Income

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-primary">

                                RM {{ number_format($totalIncome, 2) }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-6 w-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m0 0l-3-3m3 3l3-3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                    </div>

                </div>

                {{-- Pending --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Pending Services

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-yellow-600">

                                {{ $pendingServices }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-yellow-50 text-yellow-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-6 w-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                    </div>

                </div>

                {{-- Completed --}}
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Completed Services

                            </p>

                            <h2 class="mt-4 text-4xl font-bold tracking-tight text-green-600">

                                {{ $completedServices }}

                            </h2>

                        </div>

                        <div
                            class="self-center flex h-12 w-12 items-center justify-center rounded-2xl bg-green-50 text-green-600 transition group-hover:scale-110">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-6 w-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m6 2.25a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                    </div>

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
