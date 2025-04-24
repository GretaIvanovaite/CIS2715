<h1 class="text-2xl self-center">@yield('h1-title')</h1>
<nav>
    <ul class="flex justify-around text-lg">
        <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href="/">Home</a></li>
        @if (Route::currentRouteName() !== 'dashboard')
            <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href="/user/dashboard">User Dashboard</a></li>
        @endif
        @auth
            <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href="/user/logout">Logout</a></li>
        @endauth
    </ul>
</nav>