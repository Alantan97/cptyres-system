<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Workshop Management

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Service Records

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage workshop service transactions and records.

                    </p>

                </div>

                <a href="{{ route('service-records.create') }}"
                    class="inline-flex items-center rounded-xl bg-primary px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                    + Add Service Record

                </a>

            </div>

            {{-- Table Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        {{-- Header --}}
                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-5">
                                    Vehicle
                                </th>

                                <th class="px-6 py-5">
                                    Customer
                                </th>

                                <th class="px-6 py-5">
                                    Service
                                </th>

                                <th class="px-6 py-5">
                                    Date
                                </th>

                                <th class="px-6 py-5">
                                    Mileage
                                </th>

                                <th class="px-6 py-5">
                                    Price
                                </th>

                                <th class="px-6 py-5">
                                    Status
                                </th>

                                <th class="px-6 py-5 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        {{-- Body --}}
                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($serviceRecords as $record)

                                <tr class="transition hover:bg-gray-50">

                                    {{-- Vehicle --}}
                                    <td class="px-6 py-5">

                                        <div>

                                            <p class="font-semibold uppercase tracking-wide text-gray-900">

                                                {{ $record->vehicle->plate_number }}

                                            </p>

                                            <p class="text-sm text-gray-500">

                                                {{ $record->vehicle->brand }}
                                                {{ $record->vehicle->model }}

                                            </p>

                                        </div>

                                    </td>

                                    {{-- Customer --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $record->vehicle->customer->full_name }}

                                    </td>

                                    {{-- Service --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $record->service->service_name }}

                                    </td>

                                    {{-- Date --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $record->service_date }}

                                    </td>

                                    {{-- Mileage --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ number_format($record->mileage) }} km

                                    </td>

                                    {{-- Price --}}
                                    <td class="px-6 py-5">

                                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm font-semibold text-primary">

                                            RM {{ number_format($record->total_price, 2) }}

                                        </span>

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        @if ($record->status == 'completed')

                                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                                Completed

                                            </span>

                                        @else

                                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                                Pending

                                            </span>

                                        @endif

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- View --}}
                                            <a href="{{ route('service-records.show', $record->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                View

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('service-records.edit', $record->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                Edit

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('service-records.destroy', $record->id) }}"
                                                method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Delete this service record?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-xl border border-red-200 px-4 py-2 text-xs font-medium text-red-600 transition hover:bg-red-50">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8"
                                        class="px-6 py-16 text-center">

                                        <div class="flex flex-col items-center">

                                            <h3 class="text-sm font-semibold text-gray-900">

                                                No service records found

                                            </h3>

                                            <p class="mt-1 text-sm text-gray-500">

                                                Start by creating your first service transaction.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>