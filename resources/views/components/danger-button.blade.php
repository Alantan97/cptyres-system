<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center gap-2 rounded-2xl bg-red-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-red-600 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/30 active:scale-[0.98]',
    ]) }}>

    {{ $slot }}

</button>
