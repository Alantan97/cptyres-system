<x-guest-layout>

    <div class="w-full">

        <div class="mb-8 text-center">


            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Welcome Back

            </h1>

            <p class="mt-2 text-gray-500">

                Sign in to access your workshop dashboard

            </p>

        </div>

        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">

            @csrf

            {{-- Email --}}
            <div>

                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">

                    Email Address

                </label>

                <x-text-input id="email"
                    class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            {{-- Password --}}
            <div>

                <div class="mb-2 flex items-center justify-between">

                    <label for="password" class="text-sm font-semibold text-gray-700">

                        Password

                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-primary hover:underline">

                            Forgot Password?

                        </a>
                    @endif

                </div>

                <x-text-input id="password"
                    class="block w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3" type="password"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            {{-- Remember Me --}}
            <label for="remember_me" class="flex cursor-pointer items-center gap-3">

                <input id="remember_me" type="checkbox" name="remember"
                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">

                <span class="text-sm text-gray-600">

                    Remember me

                </span>

            </label>

            {{-- Login Button --}}
            <x-primary-button class="w-full justify-center">

                Sign In

            </x-primary-button>

            {{-- Register --}}
            <div class="border-t border-gray-100 pt-6 text-center">

                <p class="text-sm text-gray-500">

                    Don't have an account?

                </p>

                <a href="{{ route('register') }}" class="mt-2 inline-block font-semibold text-primary hover:underline">

                    Create Account

                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
