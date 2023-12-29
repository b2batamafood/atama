<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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

    <!-- LOGIN START -->
    <div class="contain py-16">
        {{-- Success Notification --}}
        @if (session()->has('success'))
            <div class="max-w-lg mx-auto p-4 mb-4 text-sm text-white rounded-lg bg-green-400 text-center"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Failed Notification --}}
        @if (session()->has('loginError'))
            <div class="max-w-lg mx-auto p-4 mb-4 text-sm text-white rounded-lg bg-red-400 text-center"
                role="alert">
                <span class="font-medium">{{ session('loginError') }}</span>
            </div>
        @endif

        <div class="max-w-lg mx-auto border-2 shadow-lg px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium text-center">Login</h2>
            <p class="text-gray-600 mb-6 text-sm text-center">
                Welcome back
            </p>
            <form action="/login" method="post" autocomplete="on">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Email address<span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="youremail.@domain.com" required autofocus value="{{ old('email') }}">
                        @error('email')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oh, snapp!</span> {{ $message }} </p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Password<span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="Enter your password" required>
                    </div>
                </div>
                <!-- <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot password</a>
                </div> -->
                <div class="mt-4">
                    <button type="submit" name="login"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-medium">Login</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600">Don't have account? <a href="/register"
                    class="text-primary font-semibold">Register
                    now</a></p>
        </div>
    </div>
    <!-- LOGIN END -->

    <?php
    // showFooter();
    ?>
</body>

</html>
