@extends('layouts.main')

@section('page-title', 'Questionnaire website - Login')
@section ('h1-title', 'Login')


@section('main-content')
    <section id='login' class="flex flex-col w-full lg:w-1/2 mx-auto p-8 lg:p-10 rounded-2xl shadow-xl bg-white">
        <h2 class="text-lg md:text-xl font-bold pb-8 my-auto">Please enter your login details</h2>
        <form class="flex flex-col" id="login_form" method="POST" action="user/dashboard">
            @csrf
            <label for="email" class="block mb-2 text-sm md:text-base font-medium text-black">Email</label>
            <input type="email" name="email" id="email" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="name@mail.com" autocomplete="off">
            <label for="password" class="block mb-2 text-sm md:text-base font-medium text-black">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••••" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" autocomplete="new-password">
            <button type="submit" class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-1/5 max-w-9/10">Login</button>
            <p class="text-xs md:text-sm font-light text-black text-center">Don't have an account yet? <a href="/signup" class="font-medium text-darkgreen hover:underline hover:font-bold">Sign Up</a></p>
        </form>
    </section>
@endsection