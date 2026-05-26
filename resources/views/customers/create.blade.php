<x-app-layout>

    <div class="py-10">

        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="mb-6">

                <h2 class="text-2xl font-semibold text-gray-900">
                    Add Customer
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Fill in customer information.
                </p>

            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                <form action="{{ route('customers.store') }}" method="POST">

                    @csrf

                    <div class="space-y-6">

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Full Name
                            </label>

                            <input type="text"
                                name="full_name"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-black focus:ring-black">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Phone
                            </label>

                            <input type="text"
                                name="phone"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-black focus:ring-black">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Email
                            </label>

                            <input type="email"
                                name="email"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-black focus:ring-black">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Address
                            </label>

                            <textarea name="address"
                                rows="4"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-black focus:ring-black"></textarea>
                        </div>

                        <div class="flex justify-end">

                            <button type="submit"
                                class="rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-hover">

                                Save Customer

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>