<x-guest-layout>

    <div class="w-full">

        <div class="mb-8">

            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Forgot Password?

            </h1>

            <p class="mt-2 text-gray-500">

                Enter your email address and we'll send you a password reset link.

            </p>

        </div>

        {{-- Info Card --}}
        <div class="mb-6 rounded-2xl border border-blue-200 bg-blue-50 p-4">

            <div class="flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="mt-0.5 h-5 w-5 text-blue-600">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5h-12A1.5 1.5 0 014.5 19.5v-7.5A1.5 1.5 0 016 10.5z" />

                </svg>

                <p class="text-sm text-blue-800">

                    A secure password reset link will be sent to your registered email address.

                </p>

            </div>

        </div>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">

            @csrf

            {{-- Email --}}
            <div>

                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">

                    Email Address

                </label>

                <x-text-input id="email" name="email" type="email" :value="old('email')" required autofocus
                    autocomplete="email" placeholder="Enter your email address" class="block w-full" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            {{-- Submit --}}
            <x-primary-button class="w-full justify-center">

                Send Reset Link

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
