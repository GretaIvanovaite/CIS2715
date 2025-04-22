<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Questionnaire website developed by an Edge Hill University student for the Web Systems Development and Security module">
    <title>@yield('page-title')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
</head>
<body class="min-h-screen flex flex-col justify-between">
    <header class="flex justify-between bg-mediumgreen font-semibold px-10 text-center">
        @include('includes.nav')
    </header>

    <main class="bg-lightgreen mx-20 p-8 flex-1">
        @yield('main-content')
    </main>
   
    @include('includes.footer')
</body>
</html>
