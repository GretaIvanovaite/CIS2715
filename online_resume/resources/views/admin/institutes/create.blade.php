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
        Add institutes
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
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Create a new institute</h2>
        <!-- Form -->
        <form class="max-w-2x1 mx-auto bg-white p-8 rounded-lg shadow-md space-y-6" action="{{ route('institutes.update', $institute->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                <input type="text" id="name" name="name" placeholder="e.g. Edge Hill University" required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Street -->
            <div>
                <label for="street" class="block text-gray-700 font-semibold">Street:</label>
                <input type="text" id="street" street="street" placeholder="e.g. St Helens Rd" required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                @error('street') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Town -->
            <div>
                <label for="town" class="block text-gray-700 font-semibold">Town:</label>
                <input type="text" id="town" town="town" placeholder="Ormskirk" required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                @error('town') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Postcode -->
            <div>
                <label for="postcode" class="block text-gray-700 font-semibold">Postcode:</label>
                <input type="text" id="postcode" postcode="postcode" placeholder="e.g. L39 4QP" required class="w-full px-4 py-3 h-14 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700">
                @error('postcode') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Right aligned submit button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Update Institute</button>
            </div>
        </form>
    </main>
    <footer class="bg-cyan-600 text-white text-center p-6">
        @include('includes.footer')
    </footer>
</body>
</html>