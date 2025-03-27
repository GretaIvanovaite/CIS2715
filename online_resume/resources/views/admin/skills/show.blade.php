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
        Skills
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
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Skills</h2>
        <a href="{{ route('skills.create') }}" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Add Skill</a>
        <section class="pt-12 pb-12">
            <table class="table-auto pl-6 border-2 border-solid">
                <thead class="bg-cyan-900 text-white font-bold">
                    <tr class="divide-x-3 divide-solid pb-6">
                        <th class="p-4">Skill</th>
                        <th class="p-4">Details</th>
                        <th class="p-4">Rating</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr class="divide-x-2 border-y-2 border-solid divide-3 divide-solid">
                            <td class="p-4">{{$skill->title}}</td>
                            <td class="p-4">{{$skill->detail}}</td>
                            <td class="p-4 text-center text-6x1">
                                @foreach (range(1, $skill->stars) as $star)
                                    &#x2605;
                                @endforeach
                            </td>
                            <td class="p-4 flex space-x-2 justify-center">
                                <a href="{{ route('skills.edit', $skill->id) }}" class="bg-cyan-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Update</a>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-700 transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    <footer class="bg-cyan-600 text-white text-center p-6">
        @include('includes.footer')
    </footer>
</body>
</html>