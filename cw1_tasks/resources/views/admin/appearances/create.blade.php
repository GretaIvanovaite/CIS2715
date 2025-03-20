<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add appearances</title>
    <!--Styles/Scripts-->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style></style>
    @endif
</head>
<body>
    <header class="bg-cyan-600 text-white text-center text-2xl font-bold">
        <h1>Add appearances</h1>
        @include('includes.header')
    </header>
    <main class="max-w-3x1 text-xl text-black mb-auto p-20">
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">New appearance</h2>
        <form method="POST" action="{{ route('appearances.store') }}" class="max-w-2x1 mx-auto bg-white p-8 rounded-lg shadow-md space-y-6">
            @csrf
            <div>
                <!-- Date -->
                <label for="date" class="block text-gray-700 font-semibold">Appearance date</label>
                <input type="date" id="date" name="date" required class="w-1/3 px-4 py-3 h-14 border rounded-lg focus:outline-none /focus:ring-2 focus:ring-blue-700 focus:border-blue-700 resize-none"/>
                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div>
                <!-- Title -->
                <label for="event_title" class="block text-gray-700 font-semibold">Event title</label>
                <input type="text" id="event_title" placeholder="Glastonbury festival, Slam Dunk etc." required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700"/>
                @error('event_title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div>
                <!-- Location -->
                <label for="location" class="block text-gray-700 font-semibold">Event title</label>
                <input type="text" id="location" placeholder="Leeds, Key Club etc." required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700"/>
                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div>
                <!-- Details -->
                <label for="details" class="block text-gray-700 font-semibold">Description</label>
                <input type="text" rows="5" id="details" placeholder="An opening act for Less than Jake etc." class="w-full px-4 py-3 h-32 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700 resize-none"/>
                @error('details') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Add appearance</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Footer information goes here</p>
    </footer>
</body>
</html>