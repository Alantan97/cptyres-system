<x-guest-layout>

    <div class="w-full">

        <div class="mb-8">

            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Create Account

            </h1>

            <p class="mt-2 text-gray-500">

                Join CPTyres and start managing your workshop operations.

            </p>

        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">

            @csrf

            {{-- Name --}}
            <div>

                <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">

                    Full Name

                </label>

                <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus
                    autocomplete="name" class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            {{-- Email --}}
            <div>

                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">

                    Email Address

                </label>

                <x-text-input id="email" name="email" type="email" :value="old('email')" required
                    autocomplete="username"
                    class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            {{-- Password --}}
            <div>

                <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">

                    Password

                </label>

                <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                    class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            {{-- Confirm Password --}}
            <div>

                <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-gray-700">

                    Confirm Password

                </label>

                <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                    autocomplete="new-password"
                    class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            </div>

            {{-- Submit --}}
            <x-primary-button class="w-full justify-center">

                Create Account

            </x-primary-button>

            {{-- Login Link --}}
            <div class="border-t border-gray-100 pt-6 text-center">

                <p class="text-sm text-gray-500">

                    Already have an account?

                </p>

                <a href="{{ route('login') }}" class="mt-2 inline-block font-semibold text-primary hover:underline">

                    Sign In

                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
