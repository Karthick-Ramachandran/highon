<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Job on High</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        @if(Session::has('message'))
        <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ Session::get('message') }}!</strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="mt-2 bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ Session::get('success') }}!</strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">

            </span>
        </div>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ $error }}!</strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">

            </span>
        </div>
        @endforeach
        @endif
        {{ $slot }}
    </div>
</body>

</html>
