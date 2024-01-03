<x-mall.layouts.app2>
    <x-slot:title>Cart</x-slot:title>

    <div class="ml-8 mt-10 flex items-center capitalize text-2xl space-x-3">
        <i class="ri-shopping-cart-2-line font-semibold"></i>
        <h1 class="font-medium"><span>{{ auth()->user()->firstname }}'s</span> cart</h1>
    </div>

    <div class="relative overflow-x-auto px-8 py-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Items
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr data-item-id="{{ $item->carts->first()->id }}"
                        class="cart-item
                            bg-white border-b dark:bg-gray-800 dark:border-gray-700
                            hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                        <th scope="row"
                            class="flex items-center justify-center px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-start w-full lg:w-7/12">
                                <img class="w-10 h-10 me-2 rounded-full" src="{{ $item->photo_url }}"
                                    alt="{{ $item->name }}">
                                <div class="text-start">
                                    <div class="text-base font-semibold">{{ $item->name }}</div>
                                    {{-- TODO: Fix unmatched with the other caused by DESCRIPTION data --}}
                                    <div class="font-normal text-gray-500">{{ $item->description }}</div>
                                </div>
                            </div>
                        </th>
                        {{-- Price --}}
                        <td class="px-6">
                            <div class="price text-base font-medium">${{ $item->price }}</div>
                        </td> {{-- End price --}}
                        {{-- Quantity --}}
                        <td class="px-6">
                            <div class="flex items-center justify-center">
                                {{-- QTY BUTTON --}}
                                <form class="max-w-xs">
                                    {{-- DECREMENT --}}
                                    <div class="relative flex items-center">
                                        <button type="button"
                                            class="decrement flex-shrink-0 bg-gray-100 dark:bg-gray-700
                                                dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex
                                                items-center justify-center border border-gray-300 rounded-md h-5 w-5
                                                 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text"
                                            class="quantity flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent
                                               text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                            placeholder="" value="{{ $item->carts->first()->quantity }}" required>

                                        {{-- INCREMENT --}}
                                        <button type="button"
                                            class="increment flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td> {{-- End Quantity --}}
                        {{-- Total price --}}
                        <td class="px-6">
                            <div class="total-price text-base font-bold">
                                ${{ $item->price * $item->carts->first()->quantity }}</div>
                        </td> {{-- End total price --}}
                        <td class="px-6">
                            <div id="" class="text-base font-medium">
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="data-delete-item text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button">
                                    <i class="ri-delete-bin-5-line text-xl text-red-500 hover:text-red-700"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="flex justify-end mb-3 mx-8">
        <div class="capitalize space-y-3">
            <div class="flex justify-between space-x-20">
                <div class="font-semibold">subtotal : </div>
                <div id="data-subtotal">$<span>{{ auth()->user()->totalPrice }}</span></div>
            </div>
            {{-- <div class="flex justify-between border-b-2 space-x-20">
                <div class="font-semibold">Shipping : </div>
                <div class="">$<span>5.00</span></div>
            </div> --}}
            <div class="flex justify-between border-b-2 space-x-20">
                <div class="font-semibold">tax : </div>
                <div class="">$<span>3.00</span></div>
            </div>
            <div class="flex justify-between space-x-20">
                <div class="font-semibold">grand total : </div>
                <div id="data-grandtotal">${{ auth()->user()->totalPrice }}</div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mb-10 mx-8 capitalize">
        <a href="/checkout"
            class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:brightness-75 transition ease-in-out">proceed
            to checkout</a>
    </div>

    {{-- Modal Delete Confirmation --}}
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                        you
                        sure you want to delete this item?</h3>
                    <button data-modal-hide="popup-modal" type="button"
                        class="data-btn-confirm-delete
                            text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div> {{-- End Delete Confirmation --}}

    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                updatePriceInfo({!! auth()->user()->totalPrice !!});

                $('.increment, .decrement').on('click', function() {
                    var $item = $(this).closest('tr'); // Adjust the selector based on your actual structure
                    var itemId = $item.data('item-id');
                    var $quantityInput = $item.find('.quantity');
                    var $priceInput = $item.find('.price');
                    var $totalPrice = $item.find('.total-price');

                    var quantity = parseInt($quantityInput.val());
                    var price = parseFloat($priceInput.text().replace('$', '')); // Remove the dollar sign

                    if ($(this).hasClass('increment')) {
                        quantity++;
                    } else if ($(this).hasClass('decrement') && quantity > 1) {
                        quantity--;
                    }

                    // Update quantity in the view
                    $quantityInput.val(quantity);

                    // Update total price in the view
                    var total = (quantity * price).toFixed(2);
                    //$totalPrice.text((quantity * price).toFixed(2));
                    $totalPrice.text('$' + total); // Add the dollar sign back

                    // Ajax request to update the quantity in the database
                    $.ajax({
                        url: '/update-cart-item',
                        type: 'POST',
                        data: {
                            itemId: itemId,
                            quantity: quantity
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log(response);
                            updatePriceInfo(response.data)
                        },
                        error: function(error) {
                            // Handle error if needed
                            console.log(error);
                        }
                    });
                });

                function updatePriceInfo(total) {
                    $('#data-subtotal').text('$' + total.toFixed(2));
                    const grand_total = total + 3
                    $('#data-grandtotal').text('$' + grand_total.toFixed(2));
                }

                $('.data-delete-item').on('click', function() {
                    var $item = $(this).closest('tr'); // Adjust the selector based on your actual structure
                    var itemId = $item.data('item-id');

                    // Show the confirmation modal
                    const modalDelete = $('#popup-modal');
                    //modalDelete.modal('show');

                    // Store the item ID in a data attribute for later use
                    modalDelete.data('item-id', itemId);
                });

                /* Delete item */
                $('.data-btn-confirm-delete').on('click', function() {
                    const modalDelete = $('#popup-modal');
                    // Get the stored item ID
                    var itemId = modalDelete.data('item-id');
                    // Close the confirmation modal
                    //modalDelete.modal('hide');

                    // Ajax request to delete the cart item
                    $.ajax({
                        url: '/delete-cart-item',
                        type: 'POST',
                        data: {
                            itemId: itemId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log(response);

                            // Fetch and update the cart summary, total price, and total quantity
                            location.reload();
                        },
                        error: function(error) {
                            // Handle error if needed
                            console.log(error);
                        }
                    });
                });
            });
        </script>
    </x-slot:scripts>
</x-mall.layouts.app2>
