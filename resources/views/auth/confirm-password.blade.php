<x-guest-layout>

    <div class="w-full">

        <div class="mb-8">

            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Confirm Your Password

            </h1>

            <p class="mt-2 text-gray-500">

                For security reasons, please confirm your password before continuing.

            </p>

        </div>

        <div class="mb-6 rounded-2xl border border-yellow-200 bg-yellow-50 p-4">

            <div class="flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="mt-0.5 h-5 w-5 text-yellow-600">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008z" />

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.29 3.86L1.82 18a2.25 2.25 0 001.93 3.38h16.5A2.25 2.25 0 0022.18 18L13.71 3.86a2.25 2.25 0 00-3.42 0z" />

                </svg>

                <p class="text-sm text-yellow-800">

                    This is a protected area of the system.
                    Please verify your password to proceed.

                </p>

            </div>

        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">

            @csrf

            <div>

                <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">

                    Password

                </label>

                <x-text-input id="password" name="password" type="password" required autofocus
                    autocomplete="current-password" placeholder="Enter your password" class="block w-full" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <x-primary-button class="w-full justify-center">

                Confirm Password

            </x-primary-button>

        </form>

    </div>

</x-guest-layout>
