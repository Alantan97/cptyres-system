<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Vehicle Details

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 uppercase">

                        {{ $vehicle->plate_number }}

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        View vehicle and customer information.

                    </p>

                </div>

                <a href="{{ route('vehicles.index') }}"
                    class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                    Back

                </a>

            </div>

            {{-- Main Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Top Section --}}
                <div class="border-b border-gray-100 bg-gradient-to-r from-primary/5 to-white px-8 py-8">

                    <div>

                        <h2 class="text-2xl font-semibold uppercase tracking-wide text-gray-900">

                            {{ $vehicle->plate_number }}

                        </h2>

                        <p class="mt-1 text-sm text-gray-500">

                            Vehicle ID #{{ $vehicle->id }}

                        </p>

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
                            {{ $vehicle->customer->full_name }}
                        </p>

                    </div>

                    {{-- Brand --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Brand
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $vehicle->brand }}
                        </p>

                    </div>

                    {{-- Model --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Model
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $vehicle->model }}
                        </p>

                    </div>

                    {{-- Year --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Year
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $vehicle->year }}
                        </p>

                    </div>

                    {{-- Color --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5 md:col-span-2">

                        <p class="text-sm font-medium text-gray-500">
                            Color
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $vehicle->color }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
