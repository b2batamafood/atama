<x-mall.layouts.app>
    <x-slot:title>Products</x-slot:title>
    <!-- FILTER START -->
    <div class="absolute left-0 h-fit hidden md:block md:w-48 lg:w-64 p-5 z-[1000] text-center">
        <h1 class="text-2xl md:text-3xl capitalize font-bold text-primary">categories</h1>

        <div class="max-h-[300px] overflow-y-scroll mb-10">
            <ul class="p-3">
                @foreach ($categories as $category)
                    <li class="text-xs lg:text-sm uppercase font-medium p-[6px] border-b-2 text-gray-600 hover:text-primary">
                        <form action="/products">
                            @csrf
                            <a href="/products?search={{ $category->name }}">
                                {{ $category->name }}
                            </a>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

        <h1 class="text-2xl md:text-3xl capitalize font-bold text-primary mt-51">Brand</h1>
        <div class="max-h-[300px] overflow-y-scroll">
            <ul class="p-3">
                @foreach ($brands as $brand)
                    <li class="text-sm uppercase font-medium p-[6px] border-b-2 text-gray-600 hover:text-primary">
                        <form action="/products">
                            @csrf
                            <a href="/products?search={{ $brand->name }}">
                                {{ $brand->name }}
                            </a>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- FILTER END -->

    <!-- PRODUCTS START -->
    <main class="p-5 w-full h-fit">
        {{-- <div class="w-full flex">
            <h1 class="text-4xl ml-32 lg:ml-64">filter bar</h1>
        </div> --}}

        {{-- if product found --}}
        @if ($products->count())
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 ml-0 md:ml-48 lg:ml-64 mt-5">
                <!-- Carts -->
                @foreach ($products as $product)
                    <div
                        class="bg-white shadow-xl shadow-gray-500 rounded-lg overflow-hidden group h-[370px] flex flex-col">
                        <div class="relative flex-grow flex justify-center items-center">
                            <div class="flex justify-center pt-3">
                                <img src="{{ $product->photo_url }}" alt="product"
                                    class="max-w-[120px] max-h-[100px] lg:max-w-[200px] lg:max-h-[140px] object-cover">
                            </div>
                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 hidden md:flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-300">
                                <!-- Modal toggle 1 -->
                                <button id="{{ $product->id }}" data-modal-target="product-modal"
                                    data-modal-toggle="product-modal"
                                    class="product-modal text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                    title="view product">
                                    <i class="ri-eye-line"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Cart Description -->
                        <div class="flex flex-col pt-4 pb-3 px-4">
                            <h3 class="uppercase font-semibold text-sm md:text-base">{{ $product->name }}</h3>
                            <!-- Modal toggle 2 -->
                            <button id="{{ $product->id }}" class="product-modal text-left flex-grow"
                                data-modal-target="product-modal" data-modal-toggle="product-modal">
                                <h4 class="uppercase font-normal text-sm mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $product->description }}</h4>
                            </button>
                        <div class="flex items-baseline justify-start mb-1 space-x-2">
                                @auth
                                    <p class="text-red-500 font-semibold text-2xl">
                                        {{ '$' . number_format(intval($product->price)) }}</p>
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
                                class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition pointer-events-none cursor-pointer">Add
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
                            <div id="modal-body" class="modal-body grid grid-cols-2 p-4 md:p-5">
                                <div class="w-full">
                                    <div class="w-full flex justify-center">
                                        <img id="product-modal-image" src="" alt="product"
                                            class="max-w-[300px] max-h-[320px]">
                                    </div>
                                    <div class="w-full">
                                        <h3 id="product-modal-name" class="uppercase font-semibold text-sm md:text-base">
                                        </h3>
                                        <h3 id="product-modal-description"
                                            class="uppercase font-medium text-base lg:text-base mb-2 text-primary"></h3>
                                        <h3 id="product-modal-brand" class="font-medium text-base lg:text-base mb-2">Brand :
                                        </h3>
                                    </div>

                                    {{-- Modal Footer --}}
                                    @auth
                                        <p id="product-modal-price" class="text-red-500 font-semibold text-2xl"></p>
                                    @else
                                        <a href="/login"
                                            class="capitalize text-sm px-2 py-1 bg-primary hover:bg-primary hover:opacity-70 text-white rounded-md">see
                                            price</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($products->count() <= 4)
                <div class="mb-80"></div>
            @endif
        @else
            {{-- if product not found --}}
            <div class="h-screen ml-32 lg:ml-64 mb-20">
                <h1 class="text-2xl font-bold">No product(s) found...</h1>
            </div>
        @endif
    </main>
    <!-- PRODUCTS END -->

    {{-- PAGINATION START --}}
    <div class="p-5 w-full flex justify-end">
        {{ $products->links() }}
    </div>
    {{-- PAGINATION END --}}

    <!-- Modal : Get Product Details -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('.product-modal');

            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.id;
                    // alert(productId);
                    $.ajax({
                        type: 'get',
                        // url: '/products',
                        dataType: 'json',
                        success: function(response) {
                            // Populate modal with product details
                            $('#product-modal-image').text(response.product.photo_url);
                            $('#product-modal-name').text(response.product.name);
                            $('#product-modal-description').text(response.product
                                .description);
                            $('#product-modal-brand').text(response.product.brand);
                            $('#product-modal-price').text(response.product
                                .default_price);

                            // Show the modal
                            $('#product-modal').modal('show');
                        },
                        error: function(request, status, error) {
                            $('.modal-body').html(request.responseText);
                        }
                    });
                });
            });
        });
    </script>
</x-mall.layouts.app>
