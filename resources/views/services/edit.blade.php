<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="mx-auto max-w-4xl px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">

                <div>

                    <div class="mb-3 inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">

                        Service Management

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">

                        Edit Service

                    </h1>

                    <p class="mt-2 text-sm text-gray-500">

                        Update workshop service information.

                    </p>

                </div>

                <a href="{{ route('services.index') }}"
                    class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

                    ← Back

                </a>

            </div>

            {{-- Form Card --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <form action="{{ route('services.update', $service->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid gap-8 p-8">

                        {{-- Service Name --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Service Name

                            </label>

                            <input type="text"
                                name="service_name"
                                value="{{ $service->service_name }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                        {{-- Description --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Description

                            </label>

                            <textarea name="description"
                                rows="5"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">{{ $service->description }}</textarea>

                        </div>

                        {{-- Price --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-gray-700">

                                Price (RM)

                            </label>

                            <input type="number"
                                step="0.01"
                                name="price"
                                value="{{ $service->price }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-primary focus:ring-primary">

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end border-t border-gray-100 bg-gray-50 px-8 py-5">

                        <button type="submit"
                            class="inline-flex items-center rounded-xl bg-primary px-6 py-3 text-sm font-medium text-white shadow-sm transition hover:opacity-90">

                            Update Service

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>