<x-app-layout>

    <div class="min-h-screen bg-gray-50 bg-no-repeat py-10"
        style="
        background-image: url('{{ asset('images/dashboard-bg.png') }}');
        background-position: top center;
        background-size: 100% auto;
        background-attachment: fixed;
    ">

    <div class="py-1">

        <div class="mx-auto max-w-7xl px-6">

            {{-- Header --}}
            <div class="mb-8">

                <div>
                    <div
                        class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Account Settings

                    </div>

                    <h1 class="text-4xl font-bold text-gray-900">

                        Profile

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Manage your account information and security settings.

                    </p>

                </div>

            </div>

            {{-- Profile Info --}}
            <div class="mb-6 rounded-3xl border border-gray-100 bg-white p-8 shadow-sm">

                <div class="grid gap-8 lg:grid-cols-3">

                    {{-- Left --}}
                    <div class="flex flex-col items-center justify-center border-r border-gray-100">

                        <div
                            class="flex h-24 w-24 items-center justify-center rounded-full bg-primary text-3xl font-bold text-white">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                        <h3 class="mt-4 text-xl font-bold">

                            {{ Auth::user()->name }}

                        </h3>

                        <p class="text-sm text-gray-500">

                            {{ ucfirst(Auth::user()->role) }}

                        </p>

                    </div>

                    {{-- Right --}}
                    <div class="lg:col-span-2">

                        @include('profile.partials.update-profile-information-form')

                    </div>

                </div>

            </div>

            {{-- Password --}}
            <div class="mb-6 rounded-3xl border border-gray-100 bg-white p-8 shadow-sm">

                @include('profile.partials.update-password-form')

            </div>

            {{-- Danger Zone --}}
            <div class="rounded-3xl border border-red-100 bg-red-50 p-8">

                <div class="mb-6">

                    <h2 class="text-xl font-bold text-red-600">

                        Danger Zone

                    </h2>

                    <p class="mt-1 text-sm text-red-500">

                        Permanently delete your account and all associated data.

                    </p>

                </div>

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</x-app-layout>
