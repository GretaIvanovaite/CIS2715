<!doctype html>
<html lang="en">
<head>
    <!--Styles/Scripts-->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
    <meta charset="utf-8">
    <title>@yield('page-title')</title>
</head>
<body>
    <header>
        @include('includes.header')
    </header>
    <!-Simple navigation example->
    <nav>
        @include('includes.navigation')
    </nav>
    <main>
        @yield('main-content')
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>
