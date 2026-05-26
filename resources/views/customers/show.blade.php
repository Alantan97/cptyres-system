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

        </div>

    </div>

</x-app-layout>
