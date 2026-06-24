<x-app-layout>

    <div class="min-h-screen bg-gray-50 bg-no-repeat py-10"
        style="
        background-image: url('{{ asset('images/dashboard-bg.png') }}');
        background-position: top center;
        background-size: 100% auto;
        background-attachment: fixed;
    ">

        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            <x-breadcrumb :items="[
                ['label' => 'Management', 'url' => route('services.index')],
                ['label' => 'Services', 'url' => route('services.index')],
                ['label' => 'Service Details'],
            ]" />

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Service Management

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Service Details

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        View workshop service information and pricing.

                    </p>

                </div>

                <a href="{{ route('service-records.index') }}"
                    class="inline-flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-4 w-4">

                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />

                    </svg>

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
