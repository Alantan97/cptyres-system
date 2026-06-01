@if ($paginator->hasPages())

    <div class="flex items-center justify-between">

        {{-- Mobile --}}
        <div class="flex flex-1 justify-between sm:hidden">

            @if ($paginator->onFirstPage())
                <span class="rounded-xl border border-gray-200 bg-gray-100 px-4 py-2 text-sm text-gray-400">

                    Previous

                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50">

                    Previous

                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="ml-3 rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50">

                    Next

                </a>
            @else
                <span class="ml-3 rounded-xl border border-gray-200 bg-gray-100 px-4 py-2 text-sm text-gray-400">

                    Next

                </span>
            @endif

        </div>

        {{-- Desktop --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">

            <div>

                <p class="text-sm text-gray-500">

                    Showing

                    <span class="font-medium text-gray-700">

                        {{ $paginator->firstItem() }}

                    </span>

                    to

                    <span class="font-medium text-gray-700">

                        {{ $paginator->lastItem() }}

                    </span>

                    of

                    <span class="font-medium text-gray-700">

                        {{ $paginator->total() }}

                    </span>

                    results

                </p>

            </div>

            <div>

                <span
                    class="inline-flex items-center overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="px-4 py-3 text-gray-300">

                            ‹

                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="px-4 py-3 text-gray-600 transition hover:bg-gray-50 hover:text-primary">

                            ‹

                        </a>
                    @endif

                    {{-- Pages --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="px-4 py-3 text-gray-400">

                                {{ $element }}

                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="bg-primary px-4 py-3 text-sm font-semibold text-white">

                                        {{ $page }}

                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 hover:text-primary">

                                        {{ $page }}

                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="px-4 py-3 text-gray-600 transition hover:bg-gray-50 hover:text-primary">

                            ›

                        </a>
                    @else
                        <span class="px-4 py-3 text-gray-300">

                            ›

                        </span>
                    @endif

                </span>

            </div>

        </div>

    </div>

@endif
