<x-guest-layout>

    <div class="w-full">

        <div class="mb-8">

            <h1 class="mt-6 text-3xl font-bold text-gray-900">

                Verify Your Email

            </h1>

            <p class="mt-2 text-gray-500">

                We've sent a verification link to your email address. Please verify your account before continuing.

            </p>

        </div>

        {{-- Information Card --}}
        <div class="mb-6 rounded-2xl border border-blue-200 bg-blue-50 p-4">

            <div class="flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="mt-0.5 h-5 w-5 text-blue-600">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75m19.5 0l-8.69 5.793a1.125 1.125 0 01-1.122 0L2.25 6.75" />

                </svg>

                <p class="text-sm text-blue-800">

                    Check your inbox and click the verification link to activate your account.

                </p>

            </div>

        </div>

        {{-- Success Message --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4">

                <div class="flex items-start gap-3">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="mt-0.5 h-5 w-5 text-green-600">

                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />

                    </svg>

                    <p class="text-sm text-green-800">

                        A new verification email has been sent successfully.

                    </p>

                </div>

            </div>
        @endif

        {{-- Actions --}}
        <div class="space-y-4">

            <form method="POST" action="{{ route('verification.send') }}">

                @csrf

                <x-primary-button class="w-full justify-center">

                    Resend Verification Email

                </x-primary-button>

            </form>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                    class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                    Sign Out

                </button>

            </form>

        </div>

    </div>

</x-guest-layout>
