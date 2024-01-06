<x-mall.layouts.app>
    <x-slot:title>Products</x-slot:title>

    <!-- FILTER START -->
    <div class="absolute left-0 h-fit hidden md:block md:w-48 lg:w-56 p-5 z-[1000] text-center">
        <h1 class="text-xl md:text-2xl capitalize font-bold text-primary">categories</h1>

        <div class="max-h-[300px] overflow-y-scroll mb-10">
            <ul class="p-3">
                @foreach ($categories as $category)
                    <li
                        class="text-xs lg:text-sm uppercase font-medium p-[6px] border-b-2 text-gray-600 hover:text-primary">
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

        <h1 class="text-xl md:text-2xl capitalize font-bold text-primary mt-51">Brand</h1>
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
        {{-- Breadcrumbs --}}
        <nav class="w-full flex items-center ml-0 md:ml-48 lg:ml-56" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/"
                        class="inline-flex items-center text-sm sm:text-base font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="/products"
                            class="ms-1 text-sm sm:text-base font-medium text-gray-700 hover:text-primary md:ms-2 dark:text-gray-400 dark:hover:text-white">Products</a>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- if product found --}}
        @if ($products->count())
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 ml-0 md:ml-48 lg:ml-56 mt-5">
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
                            <h3 class="uppercase font-semibold text-sm lg:text-base">{{ $product->name }}</h3>
                            <!-- Modal toggle 2 -->
                            <button id="{{ $product->id }}" class="product-modal text-left flex-grow"
                                data-modal-target="product-modal" data-modal-toggle="product-modal">
                                <h4
                                    class="uppercase font-normal text-xs md:text-sm mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $product->description }}</h4>
                            </button>
                            <div class="flex items-baseline justify-start mb-1 space-x-2">
                                @auth
                                    <p class="text-red-500 font-semibold text-lg md:text-xl">
                                        {{ '$' . number_format(floatval($product->price), 2, '.', ',') }}</p>
                                @else
                                    <a href="/login"
                                        class="capitalize text-sm px-2 py-1 bg-primary hover:bg-primary hover:opacity-70 text-white rounded-md">see
                                        price</a>
                                @endauth
                            </div>
                        </div>

                        @auth
                            <button
                                class="addToCart block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition"
                                data-product-id="{{ $product->id }}">Add to cart</button>
                        @else
                            <button
                                class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition pointer-events-none cursor-pointer">Add
                                to cart</button>
                        @endauth
                    </div>
                @endforeach
            </div>
            @if ($products->count() <= 4)
                <div class="mb-80"></div>
            @endif
        @else
            {{-- if product not found --}}
            <div class="h-screen ml-32 lg:ml-56 mb-20">
                <h1 class="text-2xl font-bold">No product(s) found...</h1>
            </div>
        @endif

        {{-- Modal --}}
        <div id="product-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[1000] w-10/12 lg:w-full md:inset-0 h-[calc(100%)] max-h-full mx-auto my-auto">
            <div class="fixed inset-0 bg-black opacity-50 z-50"></div>
            <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-md z-[1000]">
                <div class="absolute top-5 right-5">
                    <button type="button" class="text-gray-400" data-modal-hide="product-modal">
                        <i class="ri-close-line text-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div id="modal-body" class="modal-body grid grid-cols-2 p-4 md:p-5 space-x-5">
                    <div class="w-full flex items-center justify-center">
                        <img id="product-modal-image" src="" alt="product"
                            class="max-w-[130px] max-h-[150px] sm:max-w-[300px] sm:max-h-[320px]">
                    </div>
                    <div class="w-full">
                        <h3 id="product-modal-name" class="uppercase font-semibold text-xs sm:text-sm"></h3>
                        <h3 id="product-modal-description"
                            class="uppercase font-medium text-xs sm:text-sm mb-2 text-primary"></h3>
                        <h3 id="product-modal-brand" class="font-medium text-xs sm:text-sm mb-2"></h3>

                        {{-- Modal Footer --}}
                        @auth
                            <p id="product-modal-price" class="text-red-500 font-semibold text-base sm:text-lg">$</p>
                            <button id="product-modal-addCart"
                                class="addToCart w-2/3 mt-3 py-1 sm:py-2 text-sm sm:text-base text-center text-white bg-primary border border-primary rounded-lg hover:bg-transparent hover:text-primary transition"
                                data-product-id="">Add to cart</button>
                        @else
                            <a href="/login"
                                class="capitalize text-sm px-2 py-1 bg-primary hover:bg-primary hover:opacity-70 text-white rounded-md">see
                                price</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- PRODUCTS END -->

    {{-- PAGINATION START --}}
    <div class="p-5 w-full flex justify-end">
        {{ $products->links() }}
    </div>
    {{-- PAGINATION END --}}

    <!-- Modal : Get Product Details -->
    <x-slot:scripts>
        <script>
            // Show Product Modal
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('.product-modal');

                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var productId = this.id;

                        $.ajax({
                            url: '/modal-product',
                            type: 'POST',
                            data: {
                                productId: productId
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function(response) {
                                var product = response.product;
                                var brand = response.brand;

                                var formattedPrice = new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'USD', // You can change the currency based on your needs
                                    minimumFractionDigits: 2,
                                }).format(product.price);

                                document.getElementById('product-modal-image').src = product
                                    .photo_url;
                                document.getElementById('product-modal-name').innerText =
                                    product.name;
                                document.getElementById('product-modal-description')
                                    .innerText = product.description;
                                document.getElementById('product-modal-brand').innerText =
                                    "Brand : " + brand;
                                document.getElementById('product-modal-price').innerText =
                                    formattedPrice
                                document.getElementById('product-modal-addCart')
                                    .setAttribute('data-product-id', productId);
                            },
                            error: function(request, status, error) {
                                $('.modal-body').html(request.responseText);
                            }
                        });
                    });
                });
            });


            // Add To Cart
            $(document).ready(function() {
                $('.addToCart').click(function() {
                    const productId = $(this).data('product-id');
                    let url = '{{ route('cart.add', ['product_id' => ':id']) }}'
                    url = url.replace(':id', productId);
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.success);
                            console.log(response);
                            $('#data-cart-quantity').text(response.data)
                            //location.reload();
                        },
                        error: function(error) {
                            console.error('Error adding to cart:', error);
                        }
                    });
                });
            });
        </script>
    </x-slot:scripts>
</x-mall.layouts.app>
