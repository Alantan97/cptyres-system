<section class="space-y-6">

    {{-- Danger Zone Header --}}
    <div class="rounded-3xl border border-red-200 bg-red-50 p-6">

        <div class="flex items-start gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-100 text-red-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-6 w-6">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 7.5h12m-9 0V6a3 3 0 016 0v1.5m-7.5 0h9m-10.5 0l.75 12A1.5 1.5 0 007.74 21h8.52a1.5 1.5 0 001.49-1.5l.75-12" />

                </svg>

            </div>

            <div class="flex-1">

                <h2 class="text-xl font-bold text-red-700">

                    Danger Zone

                </h2>

                <p class="mt-2 text-sm leading-relaxed text-red-600">

                    Once your account is deleted, all associated data will be permanently removed and cannot be
                    recovered.

                </p>

            </div>

        </div>

        <div class="mt-6">

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">

                Delete Account

            </x-danger-button>

        </div>

    </div>

    {{-- Modal --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">

            @csrf
            @method('delete')

            <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-red-100 text-red-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008z" />

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.29 3.86L1.82 18a2.25 2.25 0 001.93 3.38h16.5A2.25 2.25 0 0022.18 18L13.71 3.86a2.25 2.25 0 00-3.42 0z" />

                </svg>

            </div>

            <h2 class="text-2xl font-bold text-gray-900">

                Delete Account

            </h2>

            <p class="mt-3 text-sm leading-relaxed text-gray-500">

                This action is permanent and cannot be undone.
                Please enter your password to confirm account deletion.

            </p>

            <div class="mt-6">

                <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">

                    Password

                </label>

                <input id="password" name="password" type="password" placeholder="Enter your password"
                    class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 transition focus:border-red-500 focus:outline-none focus:ring-0">

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

            </div>

            <div class="mt-8 flex items-center justify-end gap-3">

                <x-secondary-button x-on:click="$dispatch('close')">

                    Cancel

                </x-secondary-button>

                <x-danger-button>

                    Delete Account

                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>
