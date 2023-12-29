@extends('layouts.main')

@section('container')
    {{-- CAROUSEL START --}}
    <div id="carousel" class="relative w-full">
        <!-- Carousel wrapper -->
        <div class="relative h-40 md:h-56 overflow-hidden xl:h-80 2xl:h-96">
            <!-- Item 1 -->
            <div id="carousel-item-1" class="hidden duration-700 ease-in-out">
                <img src="img/carousel1.jpeg" class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    alt="carousel" />
            </div>
            <!-- Item 2 -->
            <div id="carousel-item-2" class="hidden duration-700 ease-in-out">
                <img src="img/carousel2.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
            <!-- Item 3 -->
            <div id="carousel-item-3" class="hidden duration-700 ease-in-out">
                <img src="img/carousel3.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
            <!-- Item 4 -->
            <div id="carousel-item-4" class="hidden duration-700 ease-in-out">
                <img src="img/carousel4.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
            <!-- Item 5 -->
            <div id="carousel-item-5" class="hidden duration-700 ease-in-out">
                <img src="img/carousel5.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
            <!-- Item 6 -->
            <div id="carousel-item-6" class="hidden duration-700 ease-in-out">
                <img src="img/carousel6.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
            <!-- Item 7 -->
            <div id="carousel-item-7" class="hidden duration-700 ease-in-out">
                <img src="img/carousel7.jpeg"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="carousel" />
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute bottom-3 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
            <button id="carousel-indicator-1" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="true"
                aria-label="Slide 1"></button>
            <button id="carousel-indicator-2" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 2"></button>
            <button id="carousel-indicator-3" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 3"></button>
            <button id="carousel-indicator-4" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 4"></button>
            <button id="carousel-indicator-5" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 5"></button>
            <button id="carousel-indicator-6" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 6"></button>
            <button id="carousel-indicator-7" type="button" class="h-3 w-3 rounded-full bg-white" aria-current="false"
                aria-label="Slide 7"></button>
        </div>
        <!-- Slider controls -->
        <button id="data-carousel-prev" type="button"
            class="group absolute left-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none">
            <span
                class="inline-flex h-8 w-8 md:h-10 md:w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none dark:bg-gray-800/20 dark:group-hover:bg-gray-800/40">
                <i class="ri-arrow-left-s-line text-xl md:text-3xl opacity-50"></i>
            </span>
        </button>
        <button id="data-carousel-next" type="button"
            class="group absolute right-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none">
            <span
                class="inline-flex h-8 w-8 md:h-10 md:w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none dark:bg-gray-800/20 dark:group-hover:bg-gray-800/40">
                <i class="ri-arrow-right-s-line text-xl md:text-3xl opacity-50"></i>
            </span>
        </button>
    </div>
    {{-- CAROUSEL END --}}

    {{-- FEATURES START --}}
    <div class="container py-16 border-primary">
        <div class="flex mb-4">
            <h1 class="text-2xl font-semibold m-auto capitalize">why choose us?</h1>
        </div>
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border shadow-lg rounded-lg px-3 py-6 flex justify-center items-center gap-5">
                <i class="ri-truck-line text-3xl"></i>
                <div>
                    <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                    <p class="text-gray-500 text-sm">Order over 1.000 items</p>
                </div>
            </div>
            <div class="border shadow-lg rounded-lg px-3 py-6 flex justify-center items-center gap-5">
                <i class="ri-percent-line text-3xl"></i>
                <div>
                    <h4 class="font-medium capitalize text-lg">promos</h4>
                    <p class="text-gray-500 text-sm">Discount everyday</p>
                </div>
            </div>
            <div class="border shadow-lg rounded-lg px-3 py-6 flex justify-center items-center gap-5">
                <i class="ri-customer-service-line text-3xl"></i>
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Customer support</p>
                </div>
            </div>
        </div>
    </div>
    {{-- FEATURES END --}}

    {{-- CATEGORIES START --}}
    <div class="container px-5 pt-5 pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
        <div class="grid grid-cols-3 gap-5">
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/beverage.jpg" alt="beverage" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">beverage</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/candy.jpeg" alt="candy" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">candy</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/snack.jpg" alt="snack" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">snack</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/noodle.jpg" alt="noodle" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">noodle</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/can_food.jpg" alt="can_food" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">can
                    food</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/dessert.jpeg" alt="dessert" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">dessert</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/condiments.jpg" alt="condiment" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">condiment</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/sauce.jpg" alt="sauce" class="w-full h-full object-cover brightness-90">
                <a href="/products/"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">sauce</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group w-full h-48 md:h-60">
                <img src="img/cooking_oil.jpeg" alt="cooking_oil" class="w-full h-full object-cover brightness-90">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl md:text-3xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition capitalize hover:ease-in-out hover:duration-500">cooking
                    oil</a>
            </div>
        </div>
    </div>
    {{-- CATEGORIES END --}}

    {{-- RECOMMENDED FOR YOU START --}}
    <div class="container px-5 pb-16">
        <div class="flex justify-between h-fit mb-6">
            <h2 class="text-2xl font-medium text-gray-800 uppercase items-center">recommended for you</h2>
            <a href="/products" class="capitalize text-blue-500 h-fit">
                see more
                <i class="ri-arrow-right-s-line text-xl"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <!-- Carts -->
            @foreach ($products1 as $recomProd)
                <div class="bg-white shadow-xl shadow-gray-500 rounded-lg overflow-hidden group h-[370px] flex flex-col">
                    <div class="relative flex-grow flex justify-center items-center">
                        <div class="absolute top-4 left-4 rounded-full bg-red-500 p-[1px] md:p-1">
                            <i class="ri-percent-line text-xl md:text-2xl text-white"></i>
                        </div>
                        <div class="flex justify-center pt-3">
                            <img src="{{ $recomProd->photo_url }}" alt="product"
                                class="max-w-[120px] max-h-[100px] lg:max-w-[200px] lg:max-h-[140px] object-cover">
                        </div>
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 hidden md:flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-300">
                            <!-- Modal toggle 1 -->
                            <button id="{{ $recomProd->id }}" data-modal-target="product-modal"
                                data-modal-toggle="product-modal"
                                class="product-modal text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="ri-eye-line"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Cart Description -->
                    <div class="flex flex-col pt-4 pb-3 px-4">
                        <h3 class="uppercase font-semibold text-sm md:text-base">{{ $recomProd->name }}</h3>
                        <!-- Modal toggle 2 -->
                        <button id="{{ $recomProd->id }}" class="product-modal text-left flex-grow"
                            data-modal-target="product-modal" data-modal-toggle="product-modal">
                            <h4 class="uppercase font-normal text-sm mb-2 text-gray-800 hover:text-primary transition">
                                {{ $recomProd->description }}</h4>
                        </button>
                        <div class="flex items-baseline justify-start mb-1 space-x-2">
                            @auth
                                <p class="text-red-500 font-semibold text-2xl">
                                    {{ '$' . number_format(intval($recomProd->default_cost)) }}</p>
                                <p class="font-semibold text-lg text-gray-400 line-through">
                                    {{ '$' . number_format(intval($recomProd->default_price)) }}</p>
                            @else
                                <a href="/login"
                                    class="capitalize text-sm px-2 py-1 bg-primary hover:bg-primary hover:opacity-70 text-white rounded-md">see
                                    price</a>
                            @endauth
                        </div>
                    </div>

                    @auth
                        <button
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition"
                            onclick="addToCart()">Add
                            to cart</button>
                    @else
                        <button
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition pointer-events-none">Add
                            to cart</button>
                    @endauth
                </div>

                <!-- Modal -->
                <div id="product-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[1000] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="fixed inset-0 bg-black opacity-50 z-50"></div>
                    <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-md z-[1000]">
                        <div class="absolute top-5 right-5">
                            <button type="button" class="text-gray-400" data-modal-hide="product-modal">
                                <i class="ri-close-line text-xl"></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body grid grid-cols-2 p-4 md:p-5">
                            <div class="w-full">


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- RECOMMENDED FOR YOU END --}}

    {{-- ALL PRODUCTS START --}}
    <div class="container px-5 pb-16">
        <div class="flex justify-between h-fit mb-6">
            <h2 class="text-2xl font-medium text-gray-800 uppercase items-center">all products</h2>
            <a href="/products" class="capitalize text-blue-500 h-fit">
                see more
                <i class="ri-arrow-right-s-line text-xl"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <!-- Carts -->
            @foreach ($products2 as $allProd)
                <div class="bg-white shadow-xl shadow-gray-500 rounded-lg overflow-hidden group h-[370px] flex flex-col">
                    <!-- Cart Image -->
                    <div class="relative flex-grow flex justify-center items-center">
                        <div class="flex justify-center pt-3">
                            <img src="{{ $allProd->photo_url }}" alt="product"
                                class="max-w-[120px] max-h-[100px] lg:max-w-[200px] lg:max-h-[140px] object-cover">
                        </div>
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 hidden md:flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-300">
                            <!-- Modal toggle 1 -->
                            <button id="{{ $allProd->id }}" data-modal-target="product-modal2"
                                data-modal-toggle="product-modal2" href="#"
                                class="product-modal2 text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="ri-eye-line"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Cart Description -->
                    <div class="flex flex-col pt-4 pb-3 px-4">
                        <h3 class="uppercase font-semibold text-sm md:text-base">{{ $allProd->name }}</h3>
                        <!-- Modal toggle 2 -->
                        <button id="{{ $allProd->id }}" class="product-modal2 text-left flex-grow"
                            data-modal-target="product-modal2" data-modal-toggle="product-modal2">
                            <h4 class="uppercase font-normal text-sm mb-2 text-gray-800 hover:text-primary transition">
                                {{ $allProd->description }}</h4>
                        </button>

                        @auth
                            <p class="text-red-500 font-semibold text-2xl">
                                {{ '$' . number_format(intval($allProd->default_price)) }}</p>
                        @else
                            <div class="flex items-baseline justify-start mb-1 space-x-2">
                                <a href="/login"
                                    class="capitalize text-sm px-2 py-1 bg-primary hover:bg-primary hover:opacity-70 text-white rounded-md">see
                                    price</a>
                            </div>
                        @endauth
                    </div>

                    @auth
                        <button
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition"
                            onclick="addToCart()">Add
                            to cart</button>
                    @else
                        <button
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition pointer-events-none cursor-pointer">Add
                            to cart</button>
                    @endauth
                </div>


                <!-- Modal -->
                <div id="product-modal2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[1000] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="fixed inset-0 bg-black opacity-50 z-50"></div>
                    <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-md z-[1000]">
                        <div class="absolute top-5 right-5">
                            <button type="button" class="text-gray-400" data-modal-hide="product-modal2">
                                <i class="ri-close-line text-xl"></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body grid grid-cols-2 p-4 md:p-5">
                            <div class="w-full">


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- ALL PRODUCTS END --}}
@endsection
