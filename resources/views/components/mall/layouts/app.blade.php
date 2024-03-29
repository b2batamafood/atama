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

    <!-- Include the slot for styles -->
    {{ $styles ?? '' }}
</head>

<body data-theme="light">
    {{-- NAVBAR START --}}
    <nav class="bg-gray-800 sticky top-0 left-0 w-full z-[9999] py-4">
        <div class="container flex items-center justify-between px-5">
            <div class="items-center justify-center">
                {{-- Logo --}}
                <a href="/" class="mr-4 md:mr-8 hidden md:flex">
                    <img src="../img/atama_logo.jpg" alt="Logo" class="w-32 max-w-[50px] max-h-[50px]">
                </a>

                {{-- All Categories --}}
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" data-dropdown-offset-distance="15" data-dropdown-placement="bottom" data-dropdown-offset-skidding="75"
                    class="flex md:hidden items-center cursor-pointer relative group" type="button">
                    <span class="text-white text-xl md:text-2xl">
                        <i class="ri-equalizer-line"></i>
                    </span>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-[1000] hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 divide-y divide-solid divide-gray-300"
                        aria-labelledby="dropdownHoverButton">
                        @foreach ($categories as $item)
                            <li>
                                <a href="/products?search={{ $item->name }}"
                                    class="flex items-center px-3 py-[10px] hover:bg-gray-100 transition">
                                    <span class="text-gray-600 text-sm capitalize">{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Search --}}
            <div class="flex items-center justify-center space-x-4 capitalize w-3/5">
                <form action="/products" class="w-full max-w-xl flex">
                    <i
                        class="ri-search-line flex items-center h-full absolute top-0 pl-2 sm:pl-3 md:pl-4 text-sm sm:text-base"></i>
                    <input type="text" name="search" id="keyword"
                        class="w-full border border-primary border-r-0 pl-7 sm:pl-8 md:pl-12 py-2 sm:py-3 pr-3 rounded-l-md focus:outline-none text-sm sm:text-base"
                        placeholder="Search something" value="{{ request('search') }}">
                    <button type="submit"
                        class="bg-primary text-white px-2 sm:px-4 md:px-6 rounded-r-md hover:opacity-80 transition text-sm sm:text-base">Search</button>
                </form>
            </div>

            <!-- Check if already login or not -->
            @auth
                <div class="flex items-center space-x-4">
                    <a href="/cart" class="text-center text-gray-200 hover:text-gray-500 transition relative">
                        <div class="text-2xl sm:text-3xl">
                            <i class="ri-shopping-cart-2-line"></i>
                        </div>
                        <div class="text-sm sm:text-base leading-3 font-semibold">Cart</div>
                        <div id="data-cart-quantity"
                            class="absolute -right-2 -top-0 sm:-right-3 sm:-top-1 w-4 h-4 sm:w-5 sm:h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs sm:text-sm">
                            @auth
                                {{ $cartQuantity }}
                            @else
                                0
                                @endif
                            </div>
                        </a>
                        <button type="button" class="text-center text-gray-200 hover:text-gray-500 transition relative"
                            onclick="toggleProfileMenu()">
                            <div class="text-2xl sm:text-3xl">
                                <i class="ri-account-circle-line"></i>
                            </div>
                            <div class="text-sm sm:text-base leading-3 capitalize font-semibold">
                                {{ auth()->user()->firstname }}
                            </div>
                        </button>

                        <ul id="profile"
                            class="w-[130px] border border-gray-100 shadow-lg shadow-black/5 py-2 rounded-md bg-white absolute top-20 right-4 md:right-8 hidden">
                            <li>
                                <a href="/setting"
                                    class="flex items-center text-center text-sm capitalize px-4 py-1.5 hover:text-primary hover:bg-gray-100">setting</a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center w-full text-center text-sm capitalize px-4 py-1.5 hover:text-primary hover:bg-gray-100">logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="text-gray-200 hover:text-white transition text-base">Login</a>
                @endauth
            </div>
        </nav>
        <!-- NAVBAR END -->

        <main>
            {{ $slot }}
        </main>

        <!-- FOOTER START -->
        <footer class="bg-neutral-200 p-2 sm:p-4 md:p-8 w-full h-fit">
            <div class="mx-auto w-full max-w-screen-xl">
                <div class="grid grid-cols-2 gap-8 px-4">
                    <div>
                        <h2 class="mb-3 md:mb-6 text-sm sm:text-base font-bold uppercase text-gray-800">contact</h2>
                        <ul class="text-opacity-70 font-medium">
                            <li class="opacity-50 text-xs sm:text-sm">
                                4010 W Valley Blvd #109
                            </li>
                            <li class="mb-2 md:mb-4 opacity-50 text-xs sm:text-sm">
                                Walnut, CA 91789
                            </li>
                            <li class="mb-2 md:mb-4 opacity-50 text-xs sm:text-sm">
                                Phone : <span>213-320-0280</span>
                            </li>
                            <li class="mb-1 opacity-50 text-xs sm:text-sm">
                                Email :
                            </li>
                            <li class="opacity-50 text-xs sm:text-sm">
                                <a href="mailto:sales@atamafood.com">sales@atamafood.com,</a>
                            </li>
                            <li class="opacity-50 text-xs sm:text-sm">
                                <a href="mailto:online.atamafood@gmail.com">online.atamafood@gmail.com,</a>
                            </li>
                            <li class="opacity-50 text-xs sm:text-sm">
                                <a href="mailto:helloiamwilliam@hotmail.com">helloiamwilliam@hotmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-3 md:mb-6 text-md font-bold uppercase text-gray-800 text-sm sm:text-base">Company</h2>
                        <ul class="font-medium">
                            <li class="mb-2 md:mb-4">
                                <a href="#" class="text-xs sm:text-sm opacity-50 capitalize">About</a>
                            </li>
                            <li class="mb-2 md:mb-4">
                                <a href="#" class="text-xs sm:text-sm opacity-50 capitalize">Location</a>
                            </li>
                            <li class="mb-2 md:mb-4">
                                <a href="#" class="text-xs sm:text-sm opacity-50 capitalize">Shipping</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="text-xs sm:text-sm opacity-50 capitalize">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

        <!-- COPYRIGHT START -->
        <div class="bg-gray-800 p-4">
            <div class="container flex items-center justify-center text-sm md:text-base">
                <p class="text-white">2023 ® All Rights Reserved
                    <span class="uppercase font-semibold text-red-400 cursor-pointer"> atama premier foods</span>
                </p>
            </div>
        </div>
        <!-- COPYRIGHT END -->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ mix('js/mall/app.js') }}"></script>
        <script src="{{ mix('js/mall/script.js') }}"></script>

        <!-- Include the slot for scripts -->
        {{ $scripts ?? '' }}
    </body>

    </html>
