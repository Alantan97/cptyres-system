<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CPTyres</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-50">

    <div class="flex min-h-screen">

        {{-- Right Panel --}}
        <div class="flex w-full items-center justify-center bg-white px-8 lg:w-1/2">

            <div class="w-full max-w-md">

                {{ $slot }}

            </div>

        </div>
        {{-- Left Panel --}}
        <div class="relative hidden w-4/5 overflow-hidden lg:flex lg:flex-col lg:justify-between bg-primary">

            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-30"
                style="
                background-image:
                radial-gradient(circle at center, white 1px, transparent 1px);
                background-size: 20px 20px;
            ">
            </div>

            {{-- Content --}}
            <div class="relative z-10 flex flex-1 items-center justify-center">

                <div class="max-w-xl text-center">

                    <img src="{{ asset('images/cptyres-white.png') }}" alt="CPTyres" class="h-[100px]">

                    <p class="mt-8 text-sm text-white/50">

                        © {{ date('Y') }} CPTyres Car Workshop Management System

                    </p>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
