@php

    $notifications = \App\Models\Notification::latest()->take(5)->get();

    $unreadCount = \App\Models\Notification::where('is_read', false)->count();

@endphp

<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-gray-100 bg-white/80 shadow-sm backdrop-blur">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('service-records.index')" :active="request()->routeIs('service-records.index')">
                        {{ __('Job Orders') }}
                    </x-nav-link>
                    <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
                        {{ __('Customers') }}
                    </x-nav-link>
                    <x-nav-link :href="route('vehicles.index')" :active="request()->routeIs('vehicles.index')">
                        {{ __('Vehicles') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services.index')" :active="request()->routeIs('services.index')">
                        {{ __('Services') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- Notifications --}}
                <div class="hidden sm:flex sm:items-center sm:me-4">

                    <x-dropdown align="right" width="96">

                        <x-slot name="trigger">

                            <button
                                class="relative rounded-xl p-2 text-gray-500 transition hover:bg-gray-100 hover:text-primary">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0018 9.75v-.7V9a6 6 0 10-12 0v.05-.001v.701a8.967 8.967 0 00-2.312 6.022c1.733.64 3.56 1.08 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />

                                </svg>

                                @if ($unreadCount > 0)
                                    <span
                                        class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white">

                                        {{ $unreadCount }}

                                    </span>
                                @endif

                            </button>

                        </x-slot>

                        <x-slot name="content">

                            <div class="px-4 py-3">

                                <div class="flex items-center justify-between px-5 py-2">

                                    <div>

                                        <h3 class="text-sm font-semibold text-primary" style="font-size: 25px;">

                                            Notifications

                                        </h3>

                                        <p class="mt-1 text-xs text-gray-500">

                                            Recent system activities

                                        </p>

                                    </div>

                                    @if ($unreadCount > 0)
                                        <form method="POST" action="{{ route('notifications.readAll') }}">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="text-xs font-medium text-primary transition hover:opacity-70">

                                                Mark all as read

                                            </button>

                                        </form>
                                    @endif

                                </div>

                            </div>

                            <div class="max-h-96 w-96 overflow-y-auto">

                                @forelse ($notifications as $notification)
                                    <form method="POST" action="{{ route('notifications.read', $notification) }}">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="w-full border-t border-gray-100 px-5 py-4 text-left transition hover:bg-gray-50">

                                            <div class="flex items-start justify-between gap-3">

                                                <div>

                                                    <h4
                                                        class="text-sm font-semibold
                                                        {{ $notification->type === 'service_reminder' ? 'text-orange-600' : 'text-gray-900' }}">
                                                        @if ($notification->type === 'service_reminder')
                                                            <div
                                                                class="self-center flex h-8 w-8 items-center justify-center rounded-2xl bg-orange-100 text-orange-600">

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.8"
                                                                    stroke="currentColor" class="h-5 w-5">

                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M12 9v3.75m9.303 3.376c.866 1.5-.217 3.374-1.95 3.374H4.647c-1.733 0-2.816-1.874-1.95-3.374L10.05 3.374c.866-1.5 3.034-1.5 3.9 0l7.353 12.752zM12 16.5h.008v.008H12v-.008z" />

                                                                </svg>

                                                            </div>
                                                        @endif
                                                        {{ $notification->title }}

                                                    </h4>

                                                    <p class="mt-1 text-sm leading-relaxed text-gray-500">

                                                        {{ $notification->message }}

                                                    </p>

                                                    <p class="mt-2 text-xs text-gray-400">

                                                        {{ $notification->created_at->diffForHumans() }}

                                                    </p>

                                                </div>

                                                @if (!$notification->is_read)
                                                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary">

                                                    </span>
                                                @endif

                                            </div>

                                        </button>

                                    </form>

                                @empty

                                    <div class="px-4 py-6 text-center text-sm text-gray-500">

                                        No notifications

                                    </div>
                                @endforelse

                            </div>

                        </x-slot>

                    </x-dropdown>

                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()?->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
