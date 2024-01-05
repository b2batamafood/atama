<x-mall.layouts.app>
    <x-slot:title>Settings</x-slot:title>
    <div class="px-10 lg:px-40 py-10 mx-auto">

        {{-- EDIT FIELD START --}}
        <div class="flex-none md:flex mb-14">
            <div class="w-full md:w-1/3 mb-5 md:mb-0">
                <h1 class="capitalize font-bold text-base md:text-lg">personal information</h1>
            </div>

            <div class="w-full md:w-2/3">
                {{-- Success Notification --}}
                @if (session()->has('successChangeProfile'))
                    <div id="alert-3"
                         class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('successChangeProfile') }}
                        </div>
                        <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                <form action="/setting" method="POST">
                    @csrf
                    <div class="flex mb-5">
                        <div class="w-1/3 mr-4">
                            <label for="firstname" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">first
                                name</label>
                            <input type="text" name="firstname" id="firstname"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded"
                                   required>
                        </div>
                        <div class="w-1/3 mx-4">
                            <label for="lastname" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">last
                                name</label>
                            <input type="text" name="lastname" id="lastname"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded"
                                   required>
                        </div>
                        <div class="w-1/3 ml-4">
                            <label for="company" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">company</label>
                            <input type="text" name="company" id="company"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded"
                                   required>
                        </div>
                    </div>
                    <div class="flex mb-5">
                        <div class="w-1/2 mr-4">
                            <label for="email" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">email</label>
                            <input type="email" name="email" id="email"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded placeholder-gray-400"
                                   placeholder="youremail@domain.com" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="phone" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">phone</label>
                            <input type="text" name="phone" id="phone"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded"
                                   required>
                        </div>
                    </div>
                    <div class="flex mb-5">
                        <div class="w-full">
                            <label for="address" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">address</label>
                            <input type="text" name="address" id="address"
                                   class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded"
                                   required>
                        </div>
                    </div>
                    <div class="flex">
                        <button type="submit" name="editField"
                                class="w-16 py-1 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition capitalize font-medium text-sm md:text-base">save</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- EDIT FIELD END --}}

        <div class="border-2 w-full"></div>

        {{-- CHANGE PASSWORD START --}}
        <div class="flex-none md:flex mt-14">
            <div class="w-full md:w-1/3 pr-0 md:pr-14 mb-5 md:mb-0">
                <h1 class="capitalize font-bold text-base md:text-lg">change password</h1>
                <p class="text-sm md:text-base">Update your password associated with your account.</p>
            </div>

            <div class="w-full md:w-2/3">
                {{-- Failed Notification --}}
                @if (session()->has('currentpwError'))
                    <div id="alert-2"
                         class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('currentpwError') }}
                        </div>
                        <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                {{-- Success Notification --}}
                @if (session()->has('successChange'))
                    <div id="alert-3"
                         class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('successChange') }}
                        </div>
                        <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                <form action="/setting" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-5">
                        <label for="current" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">current
                            password</label>
                        <input type="text" name="current" id="current"
                               class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded" required
                               autofocus>
                        @error('current')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="new" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">new
                            password</label>
                        <input type="text" name="new" id="new"
                               class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded" required>
                        @error('new')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="confirmnew" class="text-gray-600 mb-2 block font-semibold capitalize text-sm md:text-base">confirm
                            password</label>
                        <input type="text" name="confirmnew" id="confirmnew"
                               class="block w-full border border-gray-300 px-4 py-2 md:py-3 text-gray-600 text-sm rounded" required>
                        @error('confirmnew')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button type="submit" name="changePassword"
                            class="w-16 py-1 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition capitalize font-medium text-sm md:text-base">save</button>
                </form>
            </div>
        </div>
        {{-- CHANGE PASSWORD END --}}
    </div>
</x-mall.layouts.app>
