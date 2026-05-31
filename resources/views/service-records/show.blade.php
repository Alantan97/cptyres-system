<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Service Record Details

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        {{ $serviceRecord->vehicle->plate_number }}

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        View workshop transaction and service information.

                    </p>

                </div>

                <a href="{{ route('service-records.index') }}"
                    class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

                    ← Back

                </a>

            </div>

            {{-- Main Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Top Section --}}
                <div class="border-b border-gray-100 bg-gradient-to-r from-primary/5 to-white px-8 py-8">

                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                        <div>

                            <h2 class="text-2xl font-semibold uppercase tracking-wide text-gray-900">

                                {{ $serviceRecord->vehicle->plate_number }}

                            </h2>

                            <p class="mt-1 text-sm text-gray-500">

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

                                <span class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                                    Pending

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Details --}}
                <div class="grid gap-8 p-8 md:grid-cols-2">

                    {{-- Customer --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Customer
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $serviceRecord->vehicle->customer->full_name }}
                        </p>

                    </div>

                    {{-- Vehicle --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Vehicle
                        </p>

                        <p class="mt-2 text-lg font-semibold uppercase text-gray-900">
                            {{ $serviceRecord->vehicle->plate_number }}
                        </p>

                    </div>

                    {{-- Service --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Service
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $serviceRecord->service->service_name }}
                        </p>

                    </div>

                    {{-- Date --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Service Date
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $serviceRecord->service_date }}
                        </p>

                    </div>

                    {{-- Mileage --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Mileage
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ number_format($serviceRecord->mileage) }} km
                        </p>

                    </div>

                    {{-- Total Price --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Total Price
                        </p>

                        <p class="mt-2 text-lg font-semibold text-primary">
                            RM {{ number_format($serviceRecord->total_price, 2) }}
                        </p>

                    </div>

                    {{-- Notes --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5 md:col-span-2">

                        <p class="text-sm font-medium text-gray-500">
                            Notes
                        </p>

                        <p class="mt-2 text-lg text-gray-900">
                            {{ $serviceRecord->notes }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>