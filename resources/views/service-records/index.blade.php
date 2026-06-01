<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div>
                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Job Order Management

                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        Job Orders

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Workshop transaction history and records.

                    </p>

                </div>

                <div class="flex items-center gap-3">

                    {{-- Search --}}
                    <form action="{{ route('service-records.index') }}" method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search plate number, customer, status..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    {{-- Add Button --}}
                    <a href="{{ route('service-records.create') }}"
                        class="rounded-xl bg-primary px-5 py-3 text-sm font-medium text-white shadow-sm">

                        + Add Record

                    </a>

                </div>

            </div>

            {{-- Table --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-5">

                                    <a href="{{ route('service-records.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'vehicle',
                                    
                                        'direction' => request('sort') == 'vehicle' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        VEHICLE

                                        @if (request('sort') == 'vehicle')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('service-records.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'customer',
                                    
                                        'direction' => request('sort') == 'customer' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        CUSTOMER

                                        @if (request('sort') == 'customer')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">
                                    Services
                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('service-records.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'total',
                                    
                                        'direction' => request('sort') == 'total' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        TOTAL

                                        @if (request('sort') == 'total')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('service-records.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'status',
                                    
                                        'direction' => request('sort') == 'status' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        STATUS

                                        @if (request('sort') == 'status')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('service-records.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'date',
                                    
                                        'direction' => request('sort') == 'date' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        DATE

                                        @if (request('sort') == 'date')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($serviceRecords as $record)

                                <tr class="hover:bg-gray-50 transition">

                                    {{-- Vehicle --}}
                                    <td class="px-6 py-5">

                                        <div>

                                            <p class="font-semibold uppercase text-gray-900">

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

                                    {{-- Services --}}
                                    <td class="px-6 py-5">

                                        <div class="flex flex-col gap-2">

                                            @foreach ($record->items as $item)
                                                <div
                                                    class="inline-flex w-fit items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">

                                                    {{ $item->service->service_name }}

                                                    <span class="text-gray-500">

                                                        x{{ $item->quantity }}

                                                    </span>

                                                </div>
                                            @endforeach

                                        </div>

                                    </td>

                                    {{-- Total --}}
                                    <td class="px-6 py-5">

                                        <span
                                            class="rounded-full bg-primary/10 px-3 py-1 text-sm font-semibold text-primary">

                                            RM {{ number_format($record->total_price, 2) }}

                                        </span>

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        @if ($record->status == 'completed')
                                            <span
                                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                                Completed

                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                                Pending

                                            </span>
                                        @endif

                                    </td>

                                    {{-- Date --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $record->service_date }}

                                    </td>

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
                                                method="POST" onsubmit="return confirm('Delete this record?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-xl border border-red-200 px-4 py-2 text-xs font-medium text-red-600 transition hover:bg-red-50">

                                                    Delete

                                                </button>

                                            </form>

                                            <a href="{{ route('service-records.invoice', $record->id) }}"
                                                target="_blank"
                                                class="rounded-xl border border-primary/20 px-4 py-2 text-xs font-medium text-primary transition hover:bg-primary/10">

                                                Invoice

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="px-6 py-16 text-center">

                                        <div>

                                            <h3 class="text-sm font-semibold text-gray-900">

                                                No service records found

                                            </h3>

                                            <p class="mt-1 text-sm text-gray-500">

                                                Start by creating your first workshop transaction.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <div class="border-t border-gray-100 px-6 py-4">

                        {{ $serviceRecords->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
