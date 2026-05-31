<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Workshop Management

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Edit Service Record

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Update workshop transaction and service information.

                    </p>

                </div>

                <a href="{{ route('service-records.index') }}"
                    class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

                    ← Back

                </a>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('service-records.update', $serviceRecord->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Vehicle --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Vehicle

                            </label>

                            <select name="vehicle_id"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                                @foreach ($vehicles as $vehicle)

                                    <option value="{{ $vehicle->id }}"
                                        {{ $serviceRecord->vehicle_id == $vehicle->id ? 'selected' : '' }}>

                                        {{ $vehicle->plate_number }}
                                        -
                                        {{ $vehicle->customer->full_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Service --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Service

                            </label>

                            <select name="service_id"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                                @foreach ($services as $service)

                                    <option value="{{ $service->id }}"
                                        {{ $serviceRecord->service_id == $service->id ? 'selected' : '' }}>

                                        {{ $service->service_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Date --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Service Date

                            </label>

                            <input type="date"
                                name="service_date"
                                value="{{ $serviceRecord->service_date }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Mileage --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Mileage (KM)

                            </label>

                            <input type="number"
                                name="mileage"
                                value="{{ $serviceRecord->mileage }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Price --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Total Price (RM)

                            </label>

                            <input type="number"
                                step="0.01"
                                name="total_price"
                                value="{{ $serviceRecord->total_price }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Status --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Status

                            </label>

                            <select name="status"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                                <option value="pending"
                                    {{ $serviceRecord->status == 'pending' ? 'selected' : '' }}>

                                    Pending

                                </option>

                                <option value="completed"
                                    {{ $serviceRecord->status == 'completed' ? 'selected' : '' }}>

                                    Completed

                                </option>

                            </select>

                        </div>

                        {{-- Notes --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Notes

                            </label>

                            <textarea name="notes"
                                rows="5"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">{{ $serviceRecord->notes }}</textarea>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end border-t border-gray-100 bg-gray-50 px-8 py-5">

                        <button type="submit"
                            class="inline-flex items-center rounded-xl bg-primary px-6 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                            Update Service Record

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>