<x-app-layout>

    <div class="min-h-screen bg-gray-50 bg-no-repeat py-10"
        style="
        background-image: url('{{ asset('images/dashboard-bg.png') }}');
        background-position: top center;
        background-size: 100% auto;
        background-attachment: fixed;
    ">

        <div class="mx-auto max-w-4xl px-6 lg:px-8">

            <x-breadcrumb :items="[
                ['label' => 'Management', 'url' => route('staff.index')],
                ['label' => 'User', 'url' => route('staff.index')],
                ['label' => 'Add User'],
            ]" />

            {{-- Header --}}
            <div class="mb-8">

                <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                    User Management

                </div>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                    Add User

                </h1>

                <p class="mt-2 text-sm text-gray-500">

                    Create a new user account.

                </p>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form method="POST" action="{{ route('staff.store') }}">

                    @csrf

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Full Name --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Full Name

                            </label>

                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                            @error('name')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Email --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Email Address

                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                            @error('email')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Password --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Password

                            </label>

                            <input type="password" name="password"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                            @error('password')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Role --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Role

                            </label>

                            <select name="role"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                                <option value="staff">

                                    Staff

                                </option>

                                <option value="admin">

                                    Admin

                                </option>

                            </select>

                            @error('role')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-4 border-t border-gray-100 bg-gray-50 px-8 py-5">

                        <a href="{{ route('staff.index') }}"
                            class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                            Cancel

                        </a>

                        <button type="submit"
                            class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                            Create User

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
