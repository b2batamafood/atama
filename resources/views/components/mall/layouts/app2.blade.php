<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Remix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>{{ $title ?? 'Atama' }} | Atama</title>

    <link rel="stylesheet" href="{{ mix('css/mall/app.css') }}">
</head>

<body data-theme="light">
    {{-- NAVBAR START --}}
    <div class="flex flex-col items-center border-b bg-gray-800 py-4 sm:flex-row sm:px-10 lg:px-20">
        <a href="/"><img src="../img/atama_logo.jpg" alt="Logo" class="w-32 max-w-[50px] max-h-[50px]"></a>
        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
            <div class="relative">
                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <p
                            class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </p>
                        <a href="/products"><span class="font-semibold text-white text-base">Shop</span></a>
                    </li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        @if (request()->is('checkout'))
                            <p
                                class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </p>
                        @else
                            <p
                                class="flex h-6 w-6 items-center justify-center rounded-full bg-primary text-xs font-semibold text-white ring ring-primary ring-offset-2">
                                2</p>
                        @endif
                        <a href="/cart"><span class="font-semibold text-white text-base">Cart</span></a>
                    </li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        @if (request()->is('checkout'))
                            <p
                                class="flex h-6 w-6 items-center justify-center rounded-full bg-primary text-xs font-semibold text-white ring ring-primary ring-offset-2">
                                3</p>
                            <a href="/checkout"><span class="font-semibold text-white text-base">Checkout</span></a>
                        @else
                            <p
                                class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white">
                                3</p>
                            <p><span class="font-semibold text-white text-base">Checkout</span></p>
                        @endif

                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- NAVBAR END --}}

    <main>
        {{ $slot }}
    </main>

    {{-- COPYRIGHT START --}}
    <div class="bg-gray-800 p-4">
        <div class="container flex items-center justify-center text-sm md:text-base">
            <p class="text-white">2023 ® All Rights Reserved
                <span class="uppercase font-semibold text-red-400 cursor-pointer"> atama premier foods</span>
            </p>
        </div>
    </div>
    {{-- COPYRIGHT END --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ mix('js/mall/app.js') }}"></script>
    <script src="{{ mix('js/mall/script.js') }}"></script>

    <!-- Include the slot for scripts -->
    {{ $scripts ?? '' }}
</body>

</html>
