<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appearances</title>
    <!--Styles/Scripts-->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
</head>
<body>
    <header class="bg-cyan-600 text-white text-center text-2xl font-bold">
        <h1>Appearances</h1>
        @include('includes.header')
    </header>
    <main class="max-w-3x1 text-xl text-black mb-auto p-20">
        <a href="appearances/create">
            <button type="submit" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Add a new appearance</button>
        </a>
        <table class="border-solid border-2 divider-solid">
            <thead>
                <tr class="border-solid border-1 divider-solid divider-1">
                    <th>Date</th>
                    <th>Event</th>
                    <th>Location</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appearances as $appearance)
                <tr class="border-solid border-1 divider-solid divider-1">
                    <td class="p-4">{{$appearance->date}}</td>
                    <td class="p-4">{{$appearance->event_title}}</td>
                    <td class="p-4">{{$appearance->location}}</td>
                    <td class="p-4">{{$appearance->details}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>