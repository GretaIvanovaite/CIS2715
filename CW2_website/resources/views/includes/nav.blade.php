<h1 class="text-xl md:text-2xl self-center">@yield('h1-title')</h1>
<nav>
    <ul class="flex justify-around text-base md:text-lg">
        @if (Route::currentRouteName() !== 'home')
            <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href="/">Home</a></li>
        @endif
        @guest
            <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href="/login">Login</a></li>
        @endguest
        @auth
            @if (Route::currentRouteName() !== 'dashboard')
                <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black"><a href={{route('dashboard')}}>User Dashboard</a></li>
            @endif
            <li class="hover:bg-darkgreen hover:text-white px-2 py-4 active:bg-brightgreen active:text-black">
                <form action={{route('logout')}} method="POST">
                    @csrf
                    <button class="cursor-pointer hover:bg-darkgreen hover:text-white">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>