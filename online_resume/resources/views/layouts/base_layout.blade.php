<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <!--Styles/Scripts-->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
</head>
<body class="flex flex-col h-screen justify-between">
    <header class="bg-cyan-600 text-white text-center p-6 text-2xl font-bold">
        @include('includes.header')
    </header>
    <nav class="bg-teal-50 p-4">
        @include('includes.nav')
    </nav>
    <main class="max-w-3x1 text-xl text-black mb-auto pl-20 pr-20 pt-5">
        @yield('main-content')
    </main>
    <footer class="bg-cyan-600 text-white text-center p-6">
        @include('includes.footer')
    </footer>
</body>
</html>