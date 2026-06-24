<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center rounded-2xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-primary/30 active:scale-[0.98]',
    ]) }}>

    {{ $slot }}

</button>
