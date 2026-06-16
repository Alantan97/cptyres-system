<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                <div>

                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Staff Management

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Staff

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage workshop staff accounts and permissions.

                    </p>

                </div>

                {{-- Search --}}
                <div class="flex items-center gap-3">
                    <form action="{{ route('staff.index') }}" method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search staff members..."
                            class="w-80 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-primary focus:ring-primary">

                    </form>

                    <a href="{{ route('staff.create') }}"
                        class="inline-flex items-center justify-center rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                        Add Staff

                    </a>
                </div>


            </div>

            @php
                $newDirection = $direction === 'asc' ? 'desc' : 'asc';
            @endphp

            {{-- Table --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">

                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                <th class="px-6 py-5">
                                    No.
                                </th>

                                <th class="px-6 py-5">
                                    <a href="{{ route('staff.index', [
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
                                    <a href="{{ route('staff.index', [
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
                                    <a href="{{ route('staff.index', [
                                        'search' => request('search'),
                                    
                                        'sort' => 'role',
                                    
                                        'direction' => request('sort') == 'role' && request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]) }}"
                                        class="inline-flex items-center gap-2 hover:text-primary">

                                        ROLE

                                        @if (request('sort') == 'role')
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

                            @forelse ($staff as $user)
                                <tr class="transition hover:bg-gray-50">

                                    <td class="px-6 py-5 text-sm text-gray-600">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-5 font-medium text-gray-900">

                                        {{ $user->name }}

                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-600">

                                        {{ $user->email }}

                                    </td>

                                    <td class="px-6 py-5">

                                        <span
                                            class="rounded-full px-3 py-1 text-xs font-semibold

                                            {{ $user->role === 'admin' ? 'bg-primary/10 text-primary' : 'bg-blue-100 text-blue-500' }}">

                                            {{ ucfirst($user->role) }}

                                        </span>

                                    </td>

                                    <td class="px-6 py-5 text-right">

                                        <div class="flex justify-end gap-3">

                                            <a href="{{ route('staff.edit', $user) }}"
                                                class="rounded-xl border border-yellow-200 px-3 py-3 text-xs font-medium text-yellow-600 transition hover:bg-yellow-50">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>

                                            </a>

                                            @if (Auth::id() !== $user->id)
                                                <form method="POST" action="{{ route('staff.destroy', $user) }}">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
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

                                    <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">

                                        No staff found.

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
