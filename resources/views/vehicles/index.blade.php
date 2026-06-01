<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Vehicle Management

                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        Vehicles

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage registered customer vehicles.

                    </p>

                </div>

                <div class="flex items-center gap-3">

                    {{-- Search --}}
                    <form action="{{ route('vehicles.index') }}" method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search plate number, brand, model..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    {{-- Add Button --}}
                    <a href="{{ route('vehicles.create') }}"
                        class="rounded-xl bg-primary px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                        + Add Vehicle

                    </a>

                </div>

            </div>

            {{-- Table Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        {{-- Table Header --}}
                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-5">

                                    <a href="{{ route('vehicles.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'plate',
                                    
                                        'direction' => request('sort') == 'plate' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        PLATE NUMBER

                                        @if (request('sort') == 'plate')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('vehicles.index', [
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

                                    <a href="{{ route('vehicles.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'brand',
                                    
                                        'direction' => request('sort') == 'brand' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        BRAND

                                        @if (request('sort') == 'brand')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('vehicles.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'model',
                                    
                                        'direction' => request('sort') == 'model' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        MODEL

                                        @if (request('sort') == 'model')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('vehicles.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'year',
                                    
                                        'direction' => request('sort') == 'year' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        YEAR

                                        @if (request('sort') == 'year')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('vehicles.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'color',
                                    
                                        'direction' => request('sort') == 'color' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        COLOR

                                        @if (request('sort') == 'color')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($vehicles as $vehicle)
                                <tr class="transition hover:bg-gray-50">

                                    {{-- Plate Number --}}
                                    <td class="px-6 py-5">

                                        <div>

                                            <p class="font-semibold uppercase tracking-wide text-gray-900">

                                                {{ $vehicle->plate_number }}

                                            </p>

                                            <p class="text-sm text-gray-500">

                                                Vehicle ID #{{ $vehicle->id }}

                                            </p>

                                        </div>

                                    </td>

                                    {{-- Customer --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $vehicle->customer->full_name }}

                                    </td>

                                    {{-- Brand --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $vehicle->brand }}

                                    </td>

                                    {{-- Model --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $vehicle->model }}

                                    </td>

                                    {{-- Year --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $vehicle->year }}

                                    </td>

                                    {{-- Color --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $vehicle->color }}

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- View --}}
                                            <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                View

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                Edit

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                                                class="inline-block" onsubmit="return confirm('Delete this vehicle?')">

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

                                    <td colspan="7" class="px-6 py-16 text-center">

                                        <div class="flex flex-col items-center">

                                            <h3 class="text-sm font-semibold text-gray-900">

                                                No vehicles found

                                            </h3>

                                            <p class="mt-1 text-sm text-gray-500">

                                                Start by creating your first vehicle.

                                            </p>

                                        </div>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                    <div class="border-t border-gray-100 px-6 py-4">

                        {{ $vehicles->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
