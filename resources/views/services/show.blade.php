<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Service Details

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        {{ $service->service_name }}

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        View workshop service information and pricing.

                    </p>

                </div>

                <a href="{{ route('services.index') }}"
                    class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                    Back

                </a>

            </div>

            {{-- Main Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Top Section --}}
                <div class="border-b border-gray-100 bg-gradient-to-r from-primary/5 to-white px-8 py-8">

                    <div>

                        <h2 class="text-2xl font-semibold text-gray-900">

                            {{ $service->service_name }}

                        </h2>

                        <p class="mt-1 text-sm text-gray-500">

                            Service ID #{{ $service->id }}

                        </p>

                    </div>

                </div>

                {{-- Details --}}
                <div class="grid gap-8 p-8 md:grid-cols-2">

                    {{-- Service Name --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Service Name
                        </p>

                        <p class="mt-2 text-lg font-semibold text-gray-900">
                            {{ $service->service_name }}
                        </p>

                    </div>

                    {{-- Price --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">

                        <p class="text-sm font-medium text-gray-500">
                            Price
                        </p>

                        <p class="mt-2 text-lg font-semibold text-primary">
                            RM {{ number_format($service->price, 2) }}
                        </p>

                    </div>

                    {{-- Description --}}
                    <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5 md:col-span-2">

                        <p class="text-sm font-medium text-gray-500">
                            Description
                        </p>

                        <p class="mt-2 text-lg text-gray-900">
                            {{ $service->description }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
