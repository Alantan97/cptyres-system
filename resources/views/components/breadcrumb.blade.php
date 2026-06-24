@props(['items'])

<nav class="mb-6 flex items-center text-sm text-gray-500">

    @foreach ($items as $item)

        @if (!$loop->first)

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="mx-2 h-4 w-4 text-gray-400">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m9 5 7 7-7 7" />

            </svg>

        @endif

        @if (isset($item['url']))

            <a href="{{ $item['url'] }}"
                class="transition hover:text-primary">

                {{ $item['label'] }}

            </a>

        @else

            <span class="font-medium text-gray-900">

                {{ $item['label'] }}

            </span>

        @endif

    @endforeach

</nav>