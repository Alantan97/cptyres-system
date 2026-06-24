@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 placeholder:text-gray-400 transition duration-200 focus:border-primary focus:bg-white focus:outline-none focus:ring-0 disabled:cursor-not-allowed disabled:opacity-50',
    ]) }}>
