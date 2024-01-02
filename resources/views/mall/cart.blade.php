<x-mall.layouts.app>
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
                {{-- sample product 1 --}}
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                    <th scope="row"
                        class="flex items-center justify-center px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        {{-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg"
                            alt="Jese image"> --}}
                        <div class="text-start">
                            <div class="text-base font-semibold">AT-20002</div>
                            <div class="font-normal text-gray-500">SFC FRUIT SODA - PLUM 4 X 6 X 350ML</div>
                        </div>
                    </th>
                    <td class="px-6">
                        <div id="price" class="text-base font-medium">$28,8</div>
                    </td>
                    <td class="px-6">
                        <div class="flex items-center justify-center">
                            {{-- QTY BUTTON --}}
                            <form class="max-w-xs">
                                {{-- DECREMENT --}}
                                <div class="relative flex items-center">
                                    <button type="button" onclick="decrementQuantity()" id="decrement-button"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="quantity" data-input-counter
                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder="" value="" required>

                                    {{-- INCREMENT --}}
                                    <button type="button" onclick="incrementQuantity()" id="increment-button"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td class="px-6">
                        <div class="text-base font-bold">$<span id="total"></span></div>
                    </td>
                    <td class="px-6">
                        <div id="" class="text-base font-medium">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="button">
                                <i class="ri-delete-bin-5-line text-xl text-red-500 hover:text-red-700"></i>
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you
                                                sure you want to delete this item?</h3>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                {{-- sample product 2 --}}
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                    <th scope="row"
                        class="flex items-center justify-center px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        {{-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg"
                            alt="Jese image"> --}}
                        <div class="text-start">
                            <div class="text-base font-semibold">AT-30135</div>
                            <div class="font-normal text-gray-500">CHEETOS CORN STICKS (JAPANESE STEAK FLAVOR) 50 X 60G
                            </div>
                        </div>
                    </th>
                    <td class="px-6">
                        <div id="price2" class="text-base font-medium">$65</div>
                    </td>
                    <td class="px-6">
                        <div class="flex items-center justify-center">
                            {{-- QTY BUTTON --}}
                            <form class="max-w-xs">
                                {{-- DECREMENT --}}
                                <div class="relative flex items-center">
                                    <button type="button" onclick="decrementQuantity2()" id="decrement-button2"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="quantity2" data-input-counter
                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder="" value="1" required>

                                    {{-- INCREMENT --}}
                                    <button type="button" onclick="incrementQuantity2()" id="increment-button2"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td class="px-6">
                        <div class="text-base font-bold">$<span id="total2">65</span></div>
                    </td>
                    <td class="px-6">
                        <div id="" class="text-base font-medium">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="button">
                                <i class="ri-delete-bin-5-line text-xl text-red-500 hover:text-red-700"></i>
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you
                                                sure you want to delete this item?</h3>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="flex justify-end mb-3 mx-8">
        <div class="capitalize space-y-3">
            <div class="flex justify-between space-x-20">
                <div class="font-semibold">subtotal : </div>
                <div class="">$<span>93.80</span></div>
            </div>
            <div class="flex justify-between border-b-2 space-x-20">
                <div class="font-semibold">tax : </div>
                <div class="">$<span>3.00</span></div>
            </div>
            <div class="flex justify-between space-x-20">
                <div class="font-semibold">grand total : </div>
                <div class="">$<span>96.80</span></div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mb-10 mx-8 capitalize">
        <a href="#" class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:brightness-75 transition ease-in-out">proceed to checkout</a>
    </div>
</x-mall.layouts.app>
