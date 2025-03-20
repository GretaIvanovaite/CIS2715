@extends('layouts.base_layout')
@section('page-title', 'My Online Resume - Home')
@section('includes.header')
@section('h1', 'Home')
@section('includes.navigation')

@section('main-content')
   <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Welcome</h2>
   <section>
      <p class='pb-4'>Welcome to the homepage!</p>
      <p class='pb-4'>My name is: {{$name}}</p>
      <p class='pb-4'>I am {{$age}} years old</p>
      <p class='pb-4'>I am a mature student in the Edge Hill University studying BSc Web Design and Development. I have also been working and progressing in my career for the past 10 years, which has provided me with a chance to acquire and improve various transferable skills. I am currently looking to move into software or web development as I have found it to be something I have a keen interest in.</p>
      <p class='pb-4'>Please use the navigation links above to find out more about me!</p>
   </section>
@endsection

@section('includes.footer')