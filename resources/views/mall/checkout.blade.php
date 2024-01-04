<x-mall.layouts.app2>
    <x-slot:title>Checkout</x-slot:title>

    @if ($errors->any())
        <div class="max-w-lg mx-auto p-4 mb-4 text-sm text-white rounded-lg bg-red-400 text-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- CONTENT START --}}
    <form class="grid sm:px-10 lg:grid-cols-2 lg:px-20"
            action="{{ route('checkout.create') }}" method="POST"> @csrf
        {{-- Order Summary + Shipping Method START --}}
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Order Summary</p>
            <div class="mt-4 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @foreach($cart as $item)
                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                        <img class="m-2 h-[105px] w-28 rounded-md object-cover object-center"
                             src="{{ $item->photo_url }}"
                             alt="" />
                        <div class="flex w-full flex-col px-4 py-4">
                            <span class="font-semibold">{{ $item->description }}</span>
                            <span class="float-right text-gray-400">QTY : {{ $item->carts->first()->quantity }}</span>
                            <p class="mt-auto text-lg font-bold">${{ $item->price * $item->carts->first()->quantity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="mt-8 text-lg font-medium">Shipping Methods</p>
            <div class="mt-5 grid gap-6">
                <div class="relative">
                    <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_1">
                        <img class="w-14 object-contain" src="" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Delivery 1</span>
                            <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                        </div>
                    </label>
                </div>
                <div class="relative">
                    <input class="peer hidden" id="radio_2" type="radio" name="radio" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_2">
                        <img class="w-14 object-contain" src="" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Delivery 2</span>
                            <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        {{-- Order Summary + Shipping Method END --}}

        {{-- PERSONAL DETAILS START --}}
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Personal Details</p>
            <div class="grid grid-cols-2 mb-10">
                <div class="mr-2">
                    <label for="company" class="mt-4 mb-2 block text-sm font-medium">Company</label>
                    <div class="relative">
                        <input type="text" id="company" name="company"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Company" required value="{{ old('company', auth()->user()->company) }}" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <i class="ri-building-4-line"></i>
                        </div>
                    </div>
                </div>
                <div class="ml-2">
                    <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                    <div class="relative">
                        <input type="text" id="email" name="email"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="youremail.@domain.com" required value="{{ old('email', auth()->user()->email) }}" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <label for="fullname" class="mt-4 mb-2 block text-sm font-medium">Full Name</label>
                    <div class="relative">
                        <input type="text" id="fullname" name="fullname"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Full Name" required value="{{ old('fullname', auth()->user()->firstname.' '.auth()->user()->lastname) }}" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <i class="ri-profile-line"></i>
                        </div>
                    </div>
                </div>
                <div class="ml-2">
                    <label for="phone" class="mt-4 mb-2 block text-sm font-medium">Phone Number</label>
                    <div class="relative">
                        <input type="text" id="phone" name="phone"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Phone Number" required value="{{ old('phone', auth()->user()->phone) }}" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <i class="ri-phone-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            {{-- PERSONAL DETAILS END --}}

            {{-- SHIPPING DETAILS START --}}
            <p class="text-xl font-medium">Shipping Details</p>
            <div class="flex items-center justify-around">
                <div class="mr-2">
                    <label for="country" class="mt-4 mb-2 block text-sm font-medium">Country</label>
                    <div class="relative">
                        <input type="text" id="country" name="country"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Country" required value="{{ old('country', auth()->user()->country) }}" />
                    </div>
                </div>
                <div class="mx-2">
                    <label for="state" class="mt-4 mb-2 block text-sm font-medium">State</label>
                    <div class="relative">
                        <input type="text" id="state" name="state"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="State" required value="{{ old('state', auth()->user()->state) }}" />
                    </div>
                </div>
                <div class="ml-2">
                    <label for="city" class="mt-4 mb-2 block text-sm font-medium">City</label>
                    <div class="relative">
                        <input type="text" id="city" name="city"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="City" required value="{{ old('city', auth()->user()->city) }}" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 space-x-4">
                <div class="">
                    <label for="address" class="mt-4 mb-2 block text-sm font-medium">Street Address</label>
                    <div class="relative">
                        <input type="text" id="address" name="address"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Street Address" required value="{{ old('address', auth()->user()->address) }}" />
                    </div>
                </div>
                <div class="">
                    <label for="zipcode" class="mt-4 mb-2 block text-sm font-medium">Zipcode</label>
                    <div class="relative">
                        <input type="text" id="zipcode" name="zipcode"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Zipcode" required value="{{ old('zipcode', auth()->user()->zipcode) }}" />
                    </div>
                </div>
            </div>
            {{-- SHIPPING DETAILS END --}}

            {{-- PAYMENT DETAILS START --}}
            <div class="mt-10">
                <p class="text-xl font-medium">Payment Details</p>
                <div class="">
                    <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
                    <div class="relative">
                        <input type="text" id="card-holder" name="card_holder"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Full Name" required />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                        </div>
                    </div>
                    <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
                    <div class="flex">
                        <div class="relative w-7/12 flex-shrink-0">
                            <input type="text" id="card-no" name="card_no" value="{{ old('card_no') }}"
                                class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="xxxx-xxxx-xxxx-xxxx" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                </svg>
                            </div>
                        </div>
                        <input type="text" name="card_exp" value="{{ old('card_exp') }}"
                            class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="MM/YY" required />
                        <input type="text" name="card_cvc" value="{{ old('card_cvc') }}"
                            class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="CVC" required />
                    </div>
                    {{-- <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
                <div class="flex flex-col sm:flex-row">
                    <div class="relative flex-shrink-0 sm:w-7/12">
                        <input type="text" id="billing-address" name="billing-address"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Street Address" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <img class="h-4 w-4 object-contain"
                                src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg"
                                alt="" />
                        </div>
                    </div>
                    <select type="text" name="billing-state"
                        class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                        <option value="State">State</option>
                    </select>
                    <input type="text" name="billing-zip"
                        class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="ZIP" />
                </div> --}}

                    <!-- Total -->
                    <div class="mt-6 border-t border-b py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Subtotal</p>
                            <p class="font-semibold text-gray-900">${{ auth()->user()->totalPrice }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Tax</p>
                            <p class="font-semibold text-gray-900">$3.00</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Shipping</p>
                            <p class="font-semibold text-gray-900">$8.00</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">${{ auth()->user()->totalPrice + 3 + 8 }}</p>
                    </div>
                </div>
            </div>
            <button class="mt-4 mb-8 w-full rounded-md bg-primary hover:brightness-75 transition ease-in-out px-6 py-3 font-medium text-white"
                    type="submit">
                Place Order
            </button>
        </div>
        {{-- PAYMENT DETAILS END --}}
    </form>
    {{-- CONTENT END --}}

</x-mall.layouts.app2>
