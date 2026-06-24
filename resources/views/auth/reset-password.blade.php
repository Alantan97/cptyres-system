<x-guest-layout>

    <div class="w-full">

        <div class="mb-8">

            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Reset Password

            </h1>

            <p class="mt-2 text-gray-500">

                Create a new password to regain access to your account.

            </p>

        </div>

        {{-- Security Notice --}}
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4">

            <div class="flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="mt-0.5 h-5 w-5 text-green-600">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5h-12A1.5 1.5 0 014.5 19.5v-7.5A1.5 1.5 0 016 10.5z" />

                </svg>

                <p class="text-sm text-green-800">

                    Choose a strong password that you haven't used before.

                </p>

            </div>

        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">

            @csrf

            {{-- Reset Token --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <div>

                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">

                    Email Address

                </label>

                <x-text-input id="email" name="email" type="email" :value="old('email', $request->email)" required autofocus
                    autocomplete="username" class="block w-full" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            {{-- New Password --}}
            <div>

                <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">

                    New Password

                </label>

                <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                    class="block w-full" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            {{-- Confirm Password --}}
            <div>

                <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-gray-700">

                    Confirm New Password

                </label>

                <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                    autocomplete="new-password" class="block w-full" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            </div>

            {{-- Submit --}}
            <x-primary-button class="w-full justify-center">

                Reset Password

            </x-primary-button>

            {{-- Back to Login --}}
            <div class="border-t border-gray-100 pt-6 text-center">

                <a href="{{ route('login') }}" class="font-semibold text-primary hover:underline">

                    Back to Sign In

                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
