<section>
    <header class="mb-8">

        <h2 class="mt-4 text-2xl font-bold text-gray-900">

            Profile Information

        </h2>

        <p class="mt-2 text-gray-500">

            Update your account details and email address.

        </p>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>

            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">

                Full Name

            </label>

            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                autofocus autocomplete="name"
                class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-primary focus:outline-none focus:ring-0">

            <x-input-error class="mt-2" :messages="$errors->get('name')" />

        </div>

        <div>
            <div>

                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">

                    Email Address

                </label>

                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                    autocomplete="username"
                    class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-primary focus:outline-none focus:ring-0">

                <x-input-error class="mt-2" :messages="$errors->get('email')" />

            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <div class="mt-4 rounded-2xl border border-yellow-200 bg-yellow-50 p-4">

                        <p class="text-sm text-yellow-800">

                            Your email address is unverified.

                            <button form="send-verification" class="font-semibold underline">

                                Resend verification email

                            </button>

                        </p>

                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between border-t border-gray-100 pt-6">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                    class="rounded-xl bg-green-50 px-4 py-2 text-sm font-medium text-green-600">

                    Profile updated successfully.

                </p>
            @endif
        </div>
    </form>
</section>
