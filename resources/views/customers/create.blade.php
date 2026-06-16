<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-4xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Add Customer

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Create a new customer record.

                    </p>
                </div>

                <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                    Customer Management

                </div>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('customers.store') }}" method="POST">

                    @csrf

                    <div class="grid gap-8 p-8 md:grid-cols-2">

                        {{-- Full Name --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Full Name

                            </label>

                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                            @error('full_name')
                                <p class="mt-2 text-sm text-red-500">

                                    {{ $message }}

                                </p>
                            @enderror

                        </div>

                        {{-- Phone Number --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Phone Number

                            </label>

                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                            @error('phone')
                                <p class="mt-2 text-sm text-red-500">

                                    {{ $message }}

                                </p>
                            @enderror

                        </div>

                        {{-- Email Address --}}
                        <div class="md:col-span-2">

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

                        {{-- Address --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Address

                            </label>

                            <textarea name="address" rows="5"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">{{ old('address') }}</textarea>

                            @error('address')
                                <p class="mt-2 text-sm text-red-500">

                                    {{ $message }}

                                </p>
                            @enderror

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-4 border-t border-gray-100 bg-gray-50 px-8 py-5">

                        <a href="{{ route('customers.index') }}"
                            class="rounded-2xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                            Cancel

                        </a>

                        <button type="submit"
                            class="rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">

                            Create Customer

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
