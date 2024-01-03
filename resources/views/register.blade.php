<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ mix('css/mall/app.css') }}">

    <title>{{ $title }} | Atama</title>
</head>

<body>
    <nav class="bg-gray-800 sticky top-0 left-0 w-full z-[9999]">
        <div class="container flex items-center px-4">
            <a href="/" class="mr-4 md:mr-8 py-5">
                <img src="img/atama_logo.jpg" alt="Logo" class="w-32 max-w-[50px] max-h-[50px]">
            </a>
        </div>
    </nav>

    <!-- REGISTER START -->
    <div class="contain py-16">
        @if ($errors->any())
            <div class="max-w-lg mx-auto p-4 mb-4 text-sm text-white rounded-lg bg-red-400 text-center" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div
            class="max-w-[700px] mx-auto shadow-none sm:border-2 sm:shadow-lg px-4 sm:px-6 py-7 rounded overflow-hidden">
            <h2 class="text-lg sm:text-xl uppercase font-medium text-center">Create an account</h2>
            <p class="text-gray-600 mb-6 text-sm text-center">
                Register for new customer
            </p>
            <form action="/register" method="post" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="company"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Company<span
                                    class="text-red-500">*</span></label>
                            <input type="company" name="company" id="company" value="{{ old('company') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Company name" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="email"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Email<span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="youremail.@domain.com" required>
                            @error('email')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">Oh, snapp!</span> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="firstname"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">First
                                name<span class="text-red-500">*</span></label>
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="First Name" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="lastname"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Last
                                name<span class="text-red-500">*</span></label>
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="address"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Address<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Enter your address" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="phone"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Phone<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Phone number" required>
                        </div>
                    </div>

                    <div class="flex pt-2">
                        <div class="w-1/4 mr-2">
                            {{-- <select id="country" name="country"
                                class="w-full px-2 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-sm"
                                disabled>
                                <option id="country" value="" selected>Loading...</option>
                            </select> --}}
                            <input type="text" name="country" id="country" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Country">
                        </div>
                        <div class="w-1/4 mx-2">
                            <input type="text" name="state" id="state" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="State">
                        </div>
                        <div class="w-1/4 mx-2">
                            <input type="text" name="city" id="city" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="City">
                        </div>
                        <div class="w-1/4 ml-2">
                            <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Zipcode" required>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="tax_id"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Tax ID,
                                Seller
                                Permit<span class="text-red-500">*</span></label>
                            <input type="text" name="tax_id" id="tax_id" value="{{ old('tax_id') }}"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Tax ID, Seller Permit" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <!-- File Input -->
                            <label for="file"
                                class="block text-gray-600 text-sm sm:text-base font-semibold mb-1 sm:mb-2">Document</label>
                            <input type="file" id="file" name="document" accept=".zip,.pdf"
                                class="border w-full rounded-md text-sm relative">
                            <p class="text-sm text-gray-400">Compressed file: Licenses, State permits, IDs.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="agreement"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer" required>
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">Check here to indicate that
                            you have read and agree to our <a href="#" class="text-primary capitalize">terms &
                                conditions</a></label>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" name="register"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">create
                        account</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600">Already have account? <a href="/login"
                    class="text-primary font-semibold">Login now</a></p>
        </div>
    </div>
    <!-- REGISTER END -->


    {{-- <link rel="stylesheet" href="../js/script.js"> --}}

    {{-- COUNTRY, STATE, CITY DROPDOWN --}}
    <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>

    <script type="text/javascript">
        var countryInput = document.getElementById('country');
        var stateInput = document.getElementById('state');
        var cityInput = document.getElementById('city');

        if (countryInput) {
            countryInput.value = geoplugin_countryName();
        }
        if (stateInput) {
            stateInput.value = geoplugin_regionName();
        }
        if (cityInput) {
            cityInput.value = geoplugin_city();
        }
    </script>

</body>

</html>
