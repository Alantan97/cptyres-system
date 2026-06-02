<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Customer Details

                    </div>

                    <p class="mt-2 text-sm text-gray-500">

                        View customer information and profile details.

                    </p>

                </div>

                <a href="{{ route('customers.index') }}"
                    class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

                    ← Back

                </a>

            </div>

            {{-- Main Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Top Section --}}
                <div class="border-b border-gray-100 bg-gradient-to-r from-primary/5 to-white px-8 py-8">

                    <div class="flex items-center gap-5">

                        {{-- Avatar --}}
                        <div
                            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-primary text-2xl font-bold text-white shadow-sm">

                            {{ strtoupper(substr($customer->full_name, 0, 1)) }}

                        </div>

                        {{-- Info --}}
                        <div>

                            <h2 class="text-2xl font-semibold text-gray-900">

                                {{ $customer->full_name }}

                            </h2>

                            <p class="mt-1 text-sm text-gray-500">

                                Customer ID:
                                #{{ $customer->id }}

                            </p>

                        </div>

                    </div>

                </div>

                {{-- Details --}}
                <div class="grid gap-8 p-8 md:grid-cols-2">

                    {{-- Phone --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Phone Number
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $customer->phone }}
                        </p>

                    </div>

                    {{-- Email --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Email Address
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $customer->email }}
                        </p>

                    </div>

                    {{-- Address --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5 md:col-span-2">

                        <p class="text-sm font-medium text-gray-500">
                            Address
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $customer->address }}
                        </p>

                    </div>

                </div>

            </div>

            {{-- Service History --}}
            <div class="mt-8 overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-8 py-6">

                    <h2 class="text-xl font-bold text-gray-900">

                        Service History

                    </h2>

                    <p class="mt-1 text-sm text-gray-500">

                        Previous customer job orders and services.

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-4">
                                    Date
                                </th>

                                <th class="px-6 py-4">
                                    Vehicle
                                </th>

                                <th class="px-6 py-4">
                                    Services
                                </th>

                                <th class="px-6 py-4">
                                    Status
                                </th>

                                <th class="px-6 py-4">
                                    Total
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($customer->vehicles as $vehicle)

                                @foreach ($vehicle->serviceRecords as $record)
                                    <tr class="hover:bg-gray-50">

                                        {{-- Date --}}
                                        <td class="px-6 py-4 text-sm text-gray-700">

                                            {{ $record->service_date }}

                                        </td>

                                        {{-- Vehicle --}}
                                        <td class="px-6 py-4">

                                            <div class="font-medium text-gray-900">

                                                {{ $vehicle->plate_number }}

                                            </div>

                                            <div class="text-sm text-gray-500">

                                                {{ $vehicle->brand }}
                                                {{ $vehicle->model }}

                                            </div>

                                        </td>

                                        {{-- Services --}}
                                        <td class="px-6 py-4">

                                            <div class="flex flex-wrap gap-2">

                                                @foreach ($record->items as $item)
                                                    <span
                                                        class="rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">

                                                        {{ $item->service->service_name }}

                                                    </span>
                                                @endforeach

                                            </div>

                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4">

                                            <span
                                                class="rounded-full px-3 py-1 text-xs font-medium

                                    {{ $record->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">

                                                {{ ucfirst($record->status) }}

                                            </span>

                                        </td>

                                        {{-- Total --}}
                                        <td class="px-6 py-4 font-semibold text-gray-900">

                                            RM {{ number_format($record->total_price, 2) }}

                                        </td>

                                    </tr>
                                @endforeach

                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">

                                        No service history found.

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
