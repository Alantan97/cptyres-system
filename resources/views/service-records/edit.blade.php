<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-900">
                    Edit Job Order
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Update workshop transaction and services.
                </p>

            </div>

            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('service-records.update', $serviceRecord->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Vehicle --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Vehicle
                            </label>

                            <select name="vehicle_id"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

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

                        {{-- Date --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Service Date
                            </label>

                            <input type="date" name="service_date" value="{{ $serviceRecord->service_date }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                        </div>

                        {{-- Mileage --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Mileage
                            </label>

                            <input type="number" name="mileage" value="{{ $serviceRecord->mileage }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                        </div>

                    </div>

                    {{-- Services --}}
                    <div class="border-t border-gray-100 px-8 py-8">

                        <div class="mb-6 flex items-center justify-between">

                            <h2 class="text-lg font-semibold text-gray-900">
                                Services
                            </h2>

                            <button type="button" onclick="addServiceRow()"
                                class="rounded-xl bg-primary px-4 py-2 text-sm font-medium text-white">

                                + Add Service

                            </button>

                        </div>

                        <div id="service-container">

                            @foreach ($serviceRecord->items as $index => $item)
                                <div class="service-row mb-4 grid gap-4 md:grid-cols-5">

                                    {{-- Service --}}
                                    <select name="services[{{ $index }}][service_id]"
                                        class="service-select rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" data-price="{{ $service->price }}"
                                                {{ $item->service_id == $service->id ? 'selected' : '' }}>

                                                {{ $service->service_name }}

                                            </option>
                                        @endforeach

                                    </select>

                                    {{-- Quantity --}}
                                    <input type="number" name="services[{{ $index }}][quantity]"
                                        value="{{ $item->quantity }}" min="1"
                                        class="quantity-input rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                                    {{-- Price --}}
                                    <input type="text" value="RM {{ number_format($item->price, 2) }}"
                                        class="price-input rounded-xl border border-gray-200 bg-gray-100 px-4 py-3"
                                        readonly>

                                    {{-- Subtotal --}}
                                    <input type="text" value="RM {{ number_format($item->subtotal, 2) }}"
                                        class="subtotal-input rounded-xl border border-gray-200 bg-gray-100 px-4 py-3"
                                        readonly>

                                    {{-- Remove --}}
                                    <button type="button" onclick="removeRow(this)"
                                        class="rounded-xl border border-red-200 px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50">

                                        Remove

                                    </button>

                                </div>
                            @endforeach

                        </div>

                    </div>

                    {{-- Notes --}}
                    <div class="border-t border-gray-100 px-8 py-8">

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Notes
                        </label>

                        <textarea name="notes" rows="4" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">{{ $serviceRecord->notes }}</textarea>

                    </div>

                    {{-- Footer --}}
                    <div class="border-t border-gray-100 bg-gray-50 px-8 py-6">

                        <div class="flex items-center justify-between">

                            {{-- Grand Total --}}
                            <div>

                                <p class="text-sm text-gray-500">
                                    Grand Total
                                </p>

                                <h2 class="text-3xl font-bold text-primary">

                                    RM <span id="grand-total">

                                        {{ number_format($serviceRecord->total_price, 2) }}

                                    </span>

                                </h2>

                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center gap-4">

                                <select name="status" class="rounded-xl border border-gray-200 bg-white px-4 py-3">

                                    <option value="pending"
                                        {{ $serviceRecord->status == 'pending' ? 'selected' : '' }}>

                                        Pending

                                    </option>

                                    <option value="completed"
                                        {{ $serviceRecord->status == 'completed' ? 'selected' : '' }}>

                                        Completed

                                    </option>

                                </select>

                                <button type="submit" class="rounded-xl bg-primary px-6 py-3 font-medium text-white">

                                    Update Record

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        let serviceIndex = {{ count($serviceRecord->items) }};

        const services = @json($services);

        function addServiceRow() {

            let options = '';

            services.forEach(service => {

                options += `
                    <option value="${service.id}" data-price="${service.price}">
                        ${service.service_name}
                    </option>
                `;

            });

            const html = `
                <div class="service-row mb-4 grid gap-4 md:grid-cols-5">

                    <select name="services[${serviceIndex}][service_id]"
                        class="service-select rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                        ${options}

                    </select>

                    <input type="number"
                        name="services[${serviceIndex}][quantity]"
                        value="1"
                        min="1"
                        class="quantity-input rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                    <input type="text"
                        class="price-input rounded-xl border border-gray-200 bg-gray-100 px-4 py-3"
                        readonly>

                    <input type="text"
                        class="subtotal-input rounded-xl border border-gray-200 bg-gray-100 px-4 py-3"
                        readonly>

                    <button type="button"
                        onclick="removeRow(this)"
                        class="rounded-xl border border-red-200 px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50">

                        Remove

                    </button>

                </div>
            `;

            document.getElementById('service-container')
                .insertAdjacentHTML('beforeend', html);

            updatePrices();

            serviceIndex++;
        }

        function removeRow(button) {

            button.closest('.service-row').remove();

            updatePrices();
        }

        function updatePrices() {

            const rows = document.querySelectorAll('.service-row');

            let grandTotal = 0;

            rows.forEach(row => {

                const serviceSelect =
                    row.querySelector('.service-select');

                const quantityInput =
                    row.querySelector('.quantity-input');

                const priceInput =
                    row.querySelector('.price-input');

                const subtotalInput =
                    row.querySelector('.subtotal-input');

                const selectedOption =
                    serviceSelect.options[serviceSelect.selectedIndex];

                const price =
                    parseFloat(selectedOption.dataset.price);

                const quantity =
                    parseInt(quantityInput.value);

                const subtotal = price * quantity;

                priceInput.value =
                    'RM ' + price.toFixed(2);

                subtotalInput.value =
                    'RM ' + subtotal.toFixed(2);

                grandTotal += subtotal;

                serviceSelect.addEventListener('change', updatePrices);

                quantityInput.addEventListener('input', updatePrices);

            });

            document.getElementById('grand-total')
                .innerText = grandTotal.toFixed(2);
        }

        updatePrices();
    </script>

</x-app-layout>
