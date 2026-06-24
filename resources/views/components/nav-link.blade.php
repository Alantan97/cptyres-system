@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center rounded-xl bg-primary/10 px-4 py-2 text-sm font-semibold text-primary transition'
    : 'inline-flex items-center rounded-xl px-4 py-2 text-sm font-medium text-gray-500 transition hover:bg-gray-100 hover:text-primary';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>