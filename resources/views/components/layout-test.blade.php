<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Other head elements -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Remix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>{{ $title ?? 'Mall' }} | Atama</title>

    <!-- Include app.css (includes Tailwind CSS) -->
    <link rel="stylesheet" href="{{ mix('css/mall/app.css') }}">

    <!-- Include app.js (includes script.js) -->
    <script src="{{ mix('js/mall/app.js') }}"></script>
    <script src="{{ mix('js/mall/script.js') }}"></script>

</head>
<body>
<!-- Your content -->

{{ $slot }}

</body>
</html>
