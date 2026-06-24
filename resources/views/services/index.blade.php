<x-app-layout>

    <div class="min-h-screen bg-gray-50 bg-no-repeat py-10"
        style="
        background-image: url('{{ asset('images/dashboard-bg.png') }}');
        background-position: top center;
        background-size: 100% auto;
        background-attachment: fixed;
    ">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <x-breadcrumb :items="[['label' => 'Management', 'url' => route('services.index')], ['label' => 'Services']]" />

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

                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            placeholder="Search service, description, price..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    {{-- Add Button --}}
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('services.create') }}"
                            class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                            + Add Service

                        </a>
                    @endif
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
                                    No.
                                </th>

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

                                    <td class="px-6 py-5">
                                        {{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}
                                    </td>

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
                                            @if (auth()->user()->isAdmin())
                                                <a href="{{ route('services.edit', $service->id) }}"
                                                    class="rounded-xl border border-yellow-200 px-3 py-3 text-xs font-medium text-yellow-600 transition hover:bg-yellow-50">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                            @endif

                                            {{-- Delete --}}
                                            @if (auth()->user()->isAdmin())
                                                <form action="{{ route('services.destroy', $service->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Delete this service?')">

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
                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="h-48 text-center align-middle">

                                        <div class="flex flex-col items-center justify-center">

                                            <p class="font-semibold text-gray-900">
                                                No services found
                                            </p>

                                            <p class="mt-1 text-gray-500">
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

<script>
    let searchTimeout;

    document.getElementById('search')
        .addEventListener('input', function() {

            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(() => {

                this.form.submit();

            }, 0);

        });
</script>
