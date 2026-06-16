<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-4xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Edit Vehicle

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Update vehicle information and details.

                    </p>

                </div>

                <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                    Vehicle Management

                </div>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Customer --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Customer

                            </label>

                            <select name="customer_id"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ $vehicle->customer_id == $customer->id ? 'selected' : '' }}>

                                        {{ $customer->full_name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- Plate Number --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Plate Number

                            </label>

                            <input type="text" name="plate_number" value="{{ $vehicle->plate_number }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 uppercase text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Brand --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Brand

                            </label>

                            <input type="text" name="brand" value="{{ $vehicle->brand }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Model --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Model

                            </label>

                            <input type="text" name="model" value="{{ $vehicle->model }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Year --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Year

                            </label>

                            <input type="text" name="year" maxlength="4" placeholder="2024"
                                value="{{ $vehicle->year ?? '' }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Color --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Color

                            </label>

                            <input type="text" name="color" value="{{ $vehicle->color }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-4 border-t border-gray-100 bg-gray-50 px-8 py-5">

                        <a href="{{ route('vehicles.index') }}"
                            class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                            Cancel

                        </a>

                        <button type="submit"
                            class="inline-flex items-center rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                            Update Vehicle

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
