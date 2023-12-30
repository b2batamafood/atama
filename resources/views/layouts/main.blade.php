<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Remix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>{{ $title }} | Atama</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- NAVBAR START --}}
    <nav class="bg-gray-800 sticky top-0 left-0 w-full z-[9999]">
        <div class="container flex items-center px-4">
            <a href="/" class="mr-4 md:mr-8">
                <img src="../img/atama_logo.jpg" alt="Logo" class="w-32 max-w-[50px] max-h-[50px]">
            </a>
            {{-- All Categories --}}
            <div class="px-8 py-4 bg-primary md:flex items-center cursor-pointer relative group hidden">
                <span class="text-white">
                    <i class="ri-menu-line"></i>
                </span>
                <span class="capitalize ml-2 text-white font-semibold">All Categories</span>

                {{-- Dropdown --}}
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-solid divide-gray-300 opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible z-[9999]">
                    <a href="/products?search=beverage" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">beverage</span>
                    </a>
                    <a href="/products?search=candy" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">candy</span>
                    </a>
                    <a href="/products?search=snack" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">snack</span>
                    </a>
                    <a href="/products?search=noodle" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">noodle</span>
                    </a>
                    <a href="/products?search=can food" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">can food</span>
                    </a>
                    <a href="/products?search=dessert" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">dessert</span>
                    </a>
                    <a href="/products?search=condiment" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">condiment</span>
                    </a>
                    <a href="/products?search=sauce" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">sauce</span>
                    </a>
                    <a href="/products?search=cooking oil" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <span class="text-gray-600 text-sm capitalize">cooking oil</span>
                    </a>
                </div>
            </div>

            {{-- Search --}}
            <div class="flex items-center justify-center flex-grow md:pl-12 py-5">
                <div class="flex items-center space-x-4 capitalize w-full">
                    <form action="/products" class="w-full max-w-xl hidden lg:flex">
                        <i class="ri-search-line flex items-center h-full absolute top-0 pl-4"></i>
                        <input type="text" name="search" id="keyword"
                            class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                            placeholder="Search something" value="{{ request('search') }}">
                        <button type="submit"
                            class="bg-primary text-white px-6 rounded-r-md hover:opacity-80 transition">Search</button>
                    </form>
                </div>

                <!-- Check if already login or not -->
                @auth
                    <div class="flex items-center pl-2 space-x-4">
                        <a href="/cart" class="text-center text-gray-200 hover:text-gray-500 transition relative">
                            <div class="text-2xl">
                                <i class="ri-shopping-cart-2-line"></i>
                            </div>
                            <div class="text-sm leading-3">Cart</div>
                            <div
                                class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-sm">
                                0</div>
                        </a>
                        <button type="button" class="text-center text-gray-200 hover:text-gray-500 transition relative"
                            onclick="toggleProfileMenu()">
                            <div class="text-2xl">
                                <i class="ri-account-circle-line"></i>
                            </div>
                            <div class="text-sm leading-3 capitalize">
                                {{ auth()->user()->firstname }}
                            </div>
                        </button>

                        <ul id="profile"
                            class="w-[130px] border border-gray-100 shadow-lg shadow-black/5 py-2 rounded-md bg-white absolute top-20 right-4 md:right-8 hidden">
                            <li>
                                <a href="/profile"
                                    class="flex items-center text-center text-sm capitalize px-4 py-1.5 hover:text-primary hover:bg-gray-100">profile</a>
                            </li>
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
                    <a href="/login" class="text-gray-200 hover:text-white transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <main>
        @yield('container')
    </main>

    <!-- FOOTER START -->
    <footer class="bg-neutral-200 p-8 w-full h-fit">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-2">
                <div>
                    <h2 class="mb-6 text-md font-bold uppercase text-gray-800">contact</h2>
                    <ul class="text-opacity-70 font-medium">
                        <li class="opacity-50 text-sm">
                            4010 W Valley Blvd #109
                        </li>
                        <li class="mb-4 opacity-50 text-sm">
                            Walnut, CA 91789
                        </li>
                        <li class="mb-4 opacity-50 text-sm">
                            Phone : <span>213-320-0280</span>
                        </li>
                        <li class="mb-1 opacity-50 text-sm">
                            Email :
                        </li>
                        <li class="opacity-50 text-sm">
                            <a href="mailto:sales@atamafood.com">sales@atamafood.com,</a>
                        </li>
                        <li class="opacity-50 text-sm">
                            <a href="mailto:online.atamafood@gmail.com">online.atamafood@gmail.com,</a>
                        </li>
                        <li class="opacity-50 text-sm">
                            <a href="mailto:helloiamwilliam@hotmail.com">helloiamwilliam@hotmail.com
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-md font-bold uppercase text-gray-800">Company</h2>
                    <ul class="font-medium">
                        <li class="mb-4">
                            <a href="#" class="text-sm opacity-50 capitalize">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="text-sm opacity-50 capitalize">Location</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="text-sm opacity-50 capitalize">Shipping</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="text-sm opacity-50 capitalize">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- COPYRIGHT START -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-center ">
            <p class="text-white">2023 ® All Rights Reserved
                <span class="uppercase font-semibold text-red-400 cursor-pointer"> atama premier foods</span>
            </p>
        </div>
    </div>
    <!-- COPYRIGHT END -->

    <script src="js/script.js"></script>
</body>

</html>
