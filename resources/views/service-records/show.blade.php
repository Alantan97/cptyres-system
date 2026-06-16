<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Job Order Management

                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        Job Order Details

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Workshop transaction summary and services.

                    </p>

                </div>

                <a href="{{ route('service-records.index') }}"
                    class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                    Back

                </a>

            </div>

            {{-- Main Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Top Info --}}
                <div class="border-b border-gray-100 bg-gradient-to-r from-primary/5 to-white px-8 py-8">

                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                        <div>

                            <h2 class="text-2xl font-bold uppercase tracking-wide text-gray-900">

                                {{ $serviceRecord->vehicle->plate_number }}

                            </h2>

                            <p class="mt-2 text-sm text-gray-500">

                                Record ID #{{ $serviceRecord->id }}

                            </p>

                        </div>

                        {{-- Status --}}
                        <div>

                            @if ($serviceRecord->status == 'completed')
                                <span class="rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                                    Completed

                                </span>
                            @else
                                <span
                                    class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                                    Pending

                                </span>
                            @endif

                        </div>

                    </div>

                </div>

                {{-- Details --}}
                <div class="grid gap-6 border-b border-gray-100 p-8 md:grid-cols-2">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Customer
                        </p>

                        <h3 class="mt-2 text-lg font-semibold text-gray-900">

                            {{ $serviceRecord->vehicle->customer->full_name }}

                        </h3>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Service Date
                        </p>

                        <h3 class="mt-2 text-lg font-semibold text-gray-900">

                            {{ $serviceRecord->service_date }}

                        </h3>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Vehicle
                        </p>

                        <h3 class="mt-2 text-lg font-semibold uppercase text-gray-900">

                            {{ $serviceRecord->vehicle->brand }}
                            {{ $serviceRecord->vehicle->model }}

                        </h3>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Mileage
                        </p>

                        <h3 class="mt-2 text-lg font-semibold text-gray-900">

                            {{ number_format($serviceRecord->mileage) }} KM

                        </h3>

                    </div>

                </div>

                {{-- Services Table --}}
                <div class="p-8">

                    <h2 class="mb-6 text-lg font-semibold text-gray-900">

                        Services

                    </h2>

                    <div class="overflow-hidden rounded-2xl border border-gray-100">

                        <table class="min-w-full divide-y divide-gray-100">

                            <thead class="bg-gray-50">

                                <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                    <th class="px-6 py-4">
                                        Service
                                    </th>

                                    <th class="px-6 py-4">
                                        Quantity
                                    </th>

                                    <th class="px-6 py-4">
                                        Price
                                    </th>

                                    <th class="px-6 py-4">
                                        Subtotal
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-100 bg-white">

                                @foreach ($serviceRecord->items as $item)
                                    <tr>

                                        <td class="px-6 py-4 font-medium text-gray-900">

                                            {{ $item->service->service_name }}

                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-600">

                                            {{ $item->quantity }}

                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-600">

                                            RM {{ number_format($item->price, 2) }}

                                        </td>

                                        <td class="px-6 py-4 font-semibold text-primary">

                                            RM {{ number_format($item->subtotal, 2) }}

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                {{-- Notes + Total --}}
                <div class="grid gap-6 border-t border-gray-100 p-8 lg:grid-cols-2">

                    {{-- Notes --}}
                    <div>

                        <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500">

                            Notes

                        </h3>

                        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5 text-sm text-gray-700">

                            {{ $serviceRecord->notes ?: 'No notes available.' }}

                        </div>

                    </div>

                    {{-- Grand Total --}}
                    <div class="flex items-end justify-end">

                        <div class="text-right">

                            <p class="text-sm font-medium text-gray-500">

                                Grand Total

                            </p>

                            <h2 class="mt-2 text-4xl font-bold text-primary">

                                RM {{ number_format($serviceRecord->total_price, 2) }}

                            </h2>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
