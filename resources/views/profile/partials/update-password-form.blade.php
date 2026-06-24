<section>

    <header class="mb-8">

        <h2 class="mt-4 text-2xl font-bold text-gray-900">

            Update Password

        </h2>

        <p class="mt-2 text-gray-500">

            Use a strong password to keep your account secure.

        </p>

    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">

        @csrf
        @method('put')

        {{-- Current Password --}}
        <div>

            <label for="update_password_current_password" class="mb-2 block text-sm font-semibold text-gray-700">

                Current Password

            </label>

            <input id="update_password_current_password" name="current_password" type="password"
                autocomplete="current-password"
                class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-primary focus:outline-none focus:ring-0">

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

        </div>

        {{-- New Password --}}
        <div>

            <label for="update_password_password" class="mb-2 block text-sm font-semibold text-gray-700">

                New Password

            </label>

            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-primary focus:outline-none focus:ring-0">

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

        </div>

        {{-- Confirm Password --}}
        <div>

            <label for="update_password_password_confirmation" class="mb-2 block text-sm font-semibold text-gray-700">

                Confirm New Password

            </label>

            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                autocomplete="new-password"
                class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-primary focus:outline-none focus:ring-0">

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        </div>

        {{-- Footer --}}
        <div class="flex items-center justify-between border-t border-gray-100 pt-6">

            <x-primary-button>

                Update Password

            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                    class="rounded-xl bg-green-50 px-4 py-2 text-sm font-medium text-green-600">

                    Password updated successfully.

                </p>
            @endif

        </div>

    </form>

</section>
