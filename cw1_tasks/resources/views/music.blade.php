<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <!--Styles/Scripts-->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
</head>
<body>
    <header>
        @include('includes.header')
        <h1>Music</h1>
    </header>
    <main>
        <p>Main content goes here</p>
    </main>
    <footer>
        <p>Footer information goes here</p>
    </footer>
</body>
</html>
