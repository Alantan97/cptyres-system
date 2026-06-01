<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Customer Management

                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        Customers

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage customer information and records.

                    </p>

                </div>

                <div class="flex items-center gap-3">

                    {{-- Search --}}
                    <form action="{{ route('customers.index') }}" method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search customer, phone, email..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    {{-- Add Button --}}
                    <a href="{{ route('customers.create') }}"
                        class="rounded-xl bg-primary px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                        + Add Customer

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

                                    <a href="{{ route('customers.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'name',
                                    
                                        'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        NAME

                                        @if (request('sort') == 'name')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('customers.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'phone',
                                    
                                        'direction' => request('sort') == 'phone' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        PHONE

                                        @if (request('sort') == 'phone')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">

                                    <a href="{{ route('customers.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'email',
                                    
                                        'direction' => request('sort') == 'email' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        EMAIL

                                        @if (request('sort') == 'email')
                                            {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                        @endif

                                    </a>

                                </th>

                                <th class="px-6 py-5">
                                    Address
                                </th>

                                <th class="px-6 py-5 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse ($customers as $customer)
                                <tr class="transition hover:bg-gray-50">

                                    {{-- Customer --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-4">

                                            {{-- Info --}}
                                            <div>

                                                <p class="font-semibold text-gray-900">

                                                    {{ $customer->full_name }}

                                                </p>

                                                <p class="text-sm text-gray-500">

                                                    ID #{{ $customer->id }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    {{-- Phone --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $customer->phone }}

                                    </td>

                                    {{-- Email --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $customer->email }}

                                    </td>

                                    {{-- Address --}}
                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $customer->address }}

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- View --}}
                                            <a href="{{ route('customers.show', $customer->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                View

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="rounded-xl border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50">

                                                Edit

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('customers.destroy', $customer->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Delete this customer?')">

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

                                    <td colspan="5" class="px-6 py-16 text-center">

                                        <div class="flex flex-col items-center">

                                            <div class="mb-4 rounded-full bg-gray-100 p-4">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M17 20h5V4H2v16h5m10 0v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6m10 0H7" />

                                                </svg>

                                            </div>

                                            <h3 class="text-sm font-semibold text-gray-900">

                                                No customers found

                                            </h3>

                                            <p class="mt-1 text-sm text-gray-500">

                                                Start by creating your first customer.

                                            </p>

                                        </div>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                    <div class="border-t border-gray-100 px-6 py-4">

                        {{ $customers->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
