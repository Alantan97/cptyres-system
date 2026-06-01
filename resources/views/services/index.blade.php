<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Service Management

                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        Services

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage workshop services and pricing.

                    </p>

                </div>

                <div class="flex items-center gap-3">

                    {{-- Search --}}
                    <form action="{{ route('services.index') }}" method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search service, description, price..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    {{-- Add Button --}}
                    <a href="{{ route('services.create') }}"
                        class="rounded-xl bg-primary px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                        + Add Service

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

                                    <a href="{{ route('services.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'name',
                                    
                                        'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        SERVICE NAME

                                        @if (request('sort') == 'name')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">
                                    Description
                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('services.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'price',
                                    
                                        'direction' => request('sort') == 'price' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        PRICE

                                        @if (request('sort') == 'price')
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

                            @forelse ($services as $service)
                                <tr class="transition hover:bg-gray-50">

                                    {{-- Service Name --}}
                                    <td class="px-6 py-5">

                                        <div>

                                            <p class="font-semibold text-gray-900">

                                                {{ $service->service_name }}

                                            </p>

                                            <p class="text-sm text-gray-500">

                                                Service ID #{{ $service->id }}

                                            </p>

                                        </div>

                                    </td>

                                    {{-- Description --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $service->description }}

                                    </td>

                                    {{-- Price --}}
                                    <td class="px-6 py-5">

                                        <span
                                            class="rounded-full bg-primary/10 px-3 py-1 text-sm font-semibold text-primary">

                                            RM {{ number_format($service->price, 2) }}

                                        </span>

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- View --}}
                                            <a href="{{ route('services.show', $service->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                View

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('services.edit', $service->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                Edit

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                class="inline-block" onsubmit="return confirm('Delete this service?')">

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

                                    <td colspan="4" class="px-6 py-16 text-center">

                                        <div class="flex flex-col items-center">

                                            <h3 class="text-sm font-semibold text-gray-900">

                                                No services found

                                            </h3>

                                            <p class="mt-1 text-sm text-gray-500">

                                                Start by creating your first service.

                                            </p>

                                        </div>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                    <div class="border-t border-gray-100 px-6 py-4">

                        {{ $services->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
