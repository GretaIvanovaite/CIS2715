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
        Add skills
    </header>
    <nav class="bg-teal-50 p-4 container mx-auto flex justify-between items-center">
        <a class="text-cyan-800 hover:text-blue-700 font-semibold" href='#'>Admin Panel</a>
        <ol class="flex space-x-4 justify-center">
            <li><a href="../../" class="text-cyan-800 hover:text-blue-700 font-semibold">Home</a></li>
            <li><a href="../../about" class="text-cyan-800 hover:text-blue-700 font-semibold">About Me</a></li>
            <li><a href="../../skills" class="text-cyan-800 hover:text-blue-700 font-semibold">Skills</a></li>
            <li><a href="../../contact" class="text-cyan-800 hover:text-blue-700 font-semibold">Contact Me</a></li>
        </ol>
    </nav>
    <main class="max-w-3x1 text-xl text-black mb-auto p-20">
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Create a new skill</h2>
        <!-- Form -->
        <form class="max-w-2x1 mx-auto bg-white p-8 rounded-lg shadow-md space-y-6" action="{{ route('skills.store') }}" method="POST">
            @csrf
            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 font-semibold">Title:</label>
                <input type="text" id="title" name="title" placeholder="e.g., Laravel, JavaScript" required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Detail (multiline) -->
            <div>
                <label for="detail" class="block text-gray-700 font-semibold">Detail:</label>
                <textarea type="text" id="detail" name="detail" placeholder="Write a short description..." rows="5" required class="w-full px-4 py-3 h-32 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700 resize-none"></textarea>
                @error('detail') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Stars (dropdown) -->
            <div>
                <label for="stars" class="block text-gray-700 font-semibold">Stars:</label>
                <select id="stars" name="stars" class="w-full px-4 py-3 h-14 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                    <option value="1">&#x2605;</option>
                    <option value="2">&#x2605; &#x2605;</option>
                    <option value="3">&#x2605; &#x2605; &#x2605;</option>
                    <option value="4">&#x2605; &#x2605; &#x2605; &#x2605;</option>
                    <option value="5">&#x2605; &#x2605; &#x2605; &#x2605; &#x2605;</option>
                </select>
                @error('stars') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Right aligned submit button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Add Skill</button>
            
            </div>
        </form>
    </main>
    <footer class="bg-cyan-600 text-white text-center p-6">
        @include('includes.footer')
    </footer>
</body>
</html>