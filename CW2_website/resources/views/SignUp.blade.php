@extends('layouts.main')

@section('page-title', 'Questionnaire website - Sign up')
@section ('h1-title', 'Sign up')


@section('main-content')
    <section id='signup' class="flex flex-col w-full lg:w-1/2 mx-auto p-8 lg:p-10 rounded-2xl shadow-xl bg-white">
        <h2 class="text-lg md:text-xl font-bold pb-8 my-auto">Please enter your details to sign up</h2>
        <form class="flex flex-col" method="POST" action={{route('register')}}>
            @csrf
            <label for="name" class="block mb-2 text-sm md:text-base font-medium text-black">Name</label>
            <input type="name" name="name" id="name" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="Name" autocomplete="off">
            <label for="email" class="block mb-2 text-sm md:text-base font-medium text-black">Email</label>
            <input type="email" name="email" id="email" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="name@mail.com" autocomplete="off">
            <label for="password" class="block mb-2 text-sm md:text-base font-medium text-black">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••••" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" autocomplete="new-password">
            <label for="password" class="block mb-2 text-sm md:text-base font-medium text-black">Confirm password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••••" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" autocomplete="new-password">
            <button type="submit" class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-1/5 max-w-9/10">Sign Up</button>
        </form>
    </section>
@endsection