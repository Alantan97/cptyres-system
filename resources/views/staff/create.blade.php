<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-3xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8">

                <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                    Staff Management

                </div>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                    Add Staff

                </h1>

                <p class="mt-2 text-sm text-gray-500">

                    Create a new staff or admin account.

                </p>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form method="POST" action="{{ route('staff.store') }}" class="space-y-6 p-8">

                    @csrf

                    {{-- Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Full Name

                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-0">

                        @error('name')
                            <p class="mt-2 text-sm text-red-500">

                                {{ $message }}

                            </p>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Email Address

                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-0">

                        @error('email')
                            <p class="mt-2 text-sm text-red-500">

                                {{ $message }}

                            </p>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Password

                        </label>

                        <input type="password" name="password"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-0">

                        @error('password')
                            <p class="mt-2 text-sm text-red-500">

                                {{ $message }}

                            </p>
                        @enderror

                    </div>

                    {{-- Role --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Role

                        </label>

                        <select name="role"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-0">

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

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-4 pt-4">

                        <a href="{{ route('staff.index') }}"
                            class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                            Cancel

                        </a>

                        <button type="submit"
                            class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                            Create Staff

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
