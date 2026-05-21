<x-app-layout>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">
                        Customer List
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Manage customer information.
                    </p>
                </div>

                <a href="#"
                    class="inline-flex items-center justify-center rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:border-gray-300 hover:bg-gray-50">

                    + Add Customer
                </a>
            </div>

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">

                        <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                            <tr>
                                <th class="px-4 py-3 font-medium">ID</th>
                                <th class="px-4 py-3 font-medium">Full Name</th>
                                <th class="px-4 py-3 font-medium">Phone</th>
                                <th class="px-4 py-3 font-medium">Email</th>
                                <th class="px-4 py-3 font-medium">Address</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            <tr class="hover:bg-gray-50/70">
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">Alan Tan</td>
                                <td class="px-4 py-3">0123456789</td>
                                <td class="px-4 py-3">alan@gmail.com</td>
                                <td class="px-4 py-3">Terengganu</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>