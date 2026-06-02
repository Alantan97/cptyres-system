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
                                                class="rounded-xl border border-blue-200 px-3 py-3 text-xs font-medium text-blue-600 transition hover:bg-blue-50">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('service-records.edit', $record->id) }}"
                                                class="rounded-xl border border-yellow-200 px-3 py-3 text-xs font-medium text-yellow-600 transition hover:bg-yellow-50">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('service-records.destroy', $record->id) }}"
                                                method="POST" onsubmit="return confirm('Delete this record?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-xl border border-red-200 px-3 py-3 text-xs font-medium text-red-600 transition hover:bg-red-50">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </button>

                                            </form>

                                            <a href="{{ route('service-records.invoice', $record->id) }}"
                                                target="_blank"
                                                class="rounded-xl border border-primary/20 px-3 py-3 text-xs font-medium text-primary transition hover:bg-primary/10">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>


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
