@props(['active' => false])

<a
    {{ $attributes->merge([
        'class' => 'block px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 hover:text-primary',
    ]) }}>

    {{ $slot }}

</a>
