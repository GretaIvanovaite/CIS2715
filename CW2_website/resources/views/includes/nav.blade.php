<h1>@yield('h1-title')</h1>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        @guest
        <li><a href="/login">Login</a></li>
        @endguest
        @auth
        <li><a href="/user/dashboard">User Dashboard</a></li>
        @endauth
    </ul>
</nav>