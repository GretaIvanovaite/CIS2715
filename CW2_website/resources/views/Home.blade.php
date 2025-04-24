@extends('layouts.main')

@section('page-title', 'Questionnaire website - Home')
@section ('h1-title', 'Home')


@section('main-content')
 <h2 class="text-xl pb-4 m-2 font-bold">Available questionnaires</h2>
    <section id='questionnaires' class="grid grid-cols-1 md:grid-cols-3 min-w-auto">
        @forelse ($questionnaires as $questInstance)
            <article class="bg-white shadow-xl flex flex-col p-8 rounded-2xl m-2 min-w-auto">
                <h3 class="text-lg font-semibold pb-4 pr-4">{{$questInstance->title}}</h3>
                <p class="text-base">{{$questInstance->description}}</p>
                <p class="text-base font-bold py-4">Status: {{$questInstance->status}}</p>
                <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-auto max-w-9/10">Take questionnaire!</button>
            </article>
        @empty
            <p class="m-2">No questionnaires available at this time</p>
        @endforelse
    </section>
@endsection