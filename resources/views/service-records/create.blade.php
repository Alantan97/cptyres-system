<x-app-layout>

    <div class="min-h-screen bg-gray-50 bg-no-repeat py-10"
        style="
        background-image: url('{{ asset('images/dashboard-bg.png') }}');
        background-position: top center;
        background-size: 100% auto;
        background-attachment: fixed;
    ">

        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            {{-- Header --}}

            <x-breadcrumb :items="[
                ['label' => 'Job Orders', 'url' => route('service-records.index')],
                ['label' => 'Create Job Order'],
            ]" />

            <div class="mb-8 flex items-center justify-between">

                <div>
                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Job Order Management

                    </div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Create Job Order
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Create workshop transaction with multiple services.
                    </p>
                </div>

            </div>

            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('service-records.store') }}" method="POST">

                    @csrf

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Vehicle --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Vehicle
                            </label>

                            <select name="vehicle_id"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                                <option value="" selected disabled>
                                    Select Vehicle
                                </option>

                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">

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

                            <input type="date" name="service_date"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                        </div>

                        {{-- Mileage --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Mileage
                            </label>

                            <input type="number" name="mileage"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">

                        </div>

                    </div>

                    {{-- Services Section --}}
                    <div class="border-t border-gray-100 px-8 py-8">

                        <div class="mb-6 flex items-center justify-between">

                            <h2 class="text-lg font-semibold text-gray-900">
                                Services
                            </h2>

                            <button type="button" onclick="addServiceRow()"
                                class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                                + Add Service

                            </button>

                        </div>

                        <div class="mb-3 hidden gap-4 md:grid md:grid-cols-[1.4fr_1fr_1fr_1fr_50px]">

                            <div>
                                <label class="text-sm font-regular text-gray-400">
                                    Service
                                </label>
                            </div>

                            <div>
                                <label class="text-sm font-regular text-gray-400">
                                    Quantity
                                </label>
                            </div>

                            <div>
                                <label class="text-sm font-regular text-gray-400">
                                    Unit Price
                                </label>
                            </div>

                            <div>
                                <label class="text-sm font-regular text-gray-400">
                                    Subtotal
                                </label>
                            </div>

                            <div>
                                <label class="text-sm font-regular text-gray-400">
                                    Action
                                </label>

                            </div>

                        </div>

                        <div id="service-container">

                        </div>

                    </div>

                    {{-- Notes --}}
                    <div class="border-t border-gray-100 px-8 py-8">

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Notes
                        </label>

                        <textarea name="notes" rows="4" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3"></textarea>

                    </div>

                    {{-- Footer --}}
                    <div class="border-t border-gray-100 bg-gray-50 px-8 py-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Grand Total
                                </p>

                                <h2 class="text-3xl font-bold text-primary">

                                    RM <span id="grand-total">0.00</span>

                                </h2>

                            </div>

                            <div class="flex items-center gap-4">

                                <select name="status"
                                    class="min-w-[140px] rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm">

                                    <option value="pending">
                                        Pending
                                    </option>

                                    <option value="in_progress">
                                        In Progress
                                    </option>

                                    <option value="completed">
                                        Completed
                                    </option>

                                </select>

                                <a href="{{ route('service-records.index') }}"
                                    class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                                    Cancel

                                </a>

                                <button type="submit"
                                    class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                                    Save Record

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        let serviceIndex = 0;

        const services = @json($services);

        function addServiceRow() {

            let options = `
                <option value="" selected disabled>
                    Select Service
                </option>
            `;

            services.forEach(service => {

                options += `
                    <option value="${service.id}" data-price="${service.price}">
                        ${service.service_name}
                    </option>
                `;

            });

            const html = `
                <div class="service-row mb-4 grid items-center gap-4 md:grid-cols-[2fr_1fr_1fr_1fr_auto]">

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

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>
            `;

            document.getElementById('service-container')
                .insertAdjacentHTML('beforeend', html);

            updatePrices();

            serviceIndex++;
        }

        function updatePrices() {

            const rows = document.querySelectorAll('.service-row');

            let grandTotal = 0;

            rows.forEach(row => {

                const serviceSelect = row.querySelector('.service-select');

                const quantityInput = row.querySelector('.quantity-input');

                const priceInput = row.querySelector('.price-input');

                const subtotalInput = row.querySelector('.subtotal-input');

                const selectedOption =
                    serviceSelect.options[serviceSelect.selectedIndex];

                const price =
                    parseFloat(selectedOption.dataset.price || 0);

                const quantity =
                    parseInt(quantityInput.value);

                const subtotal = price * quantity;

                priceInput.value = 'RM ' + price.toFixed(2);

                subtotalInput.value = 'RM ' + subtotal.toFixed(2);

                grandTotal += subtotal;

                serviceSelect.addEventListener('change', updatePrices);

                quantityInput.addEventListener('input', updatePrices);

            });

            document.getElementById('grand-total')
                .innerText = grandTotal.toFixed(2);
        }

        addServiceRow();

        function removeRow(button) {

            const rows = document.querySelectorAll('.service-row');

            // Prevent removing last row
            if (rows.length === 1) {

                return;

            }

            button.closest('.service-row').remove();

            updatePrices();
        }
    </script>

</x-app-layout>
