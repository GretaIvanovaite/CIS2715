<footer class="flex justify-between bg-mediumgreen px-15 py-10">
    <section>
        <p>This website has been created as part of the CIS2715 module coursework!</p>
        <p>If you require any help please contact me: <a class="underline hover:text-white" href="mailto:25393081@edgehill.ac.uk">25393081@edgehill.ac.uk</a><p>
    </section>
    <section id="second_nav">
        <ul>
            @if (Route::currentRouteName() !== 'home')
                <li class="hover:bg-darkgreen hover:text-white active:bg-brightgreen active:text-black px-4"><a href="/">Home</a></li>
            @endif
            @guest
                <li class="hover:bg-darkgreen hover:text-white active:bg-brightgreen active:text-black px-4"><a href="/login">Login</a></li>
            @endguest
            @auth
                <li class="hover:bg-darkgreen hover:text-white active:bg-brightgreen active:text-black px-4"><a href="/user/dashboard">User Dashboard</a></li>
            @endauth
        </ul>
    </section>
</footer>