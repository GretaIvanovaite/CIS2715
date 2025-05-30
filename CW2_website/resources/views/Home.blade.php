@extends('layouts.main')

@section('page-title', 'Questionnaire website - Home')
@section ('h1-title', 'Home')


@section('main-content')
 <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">Available questionnaires</h2>
    <section id='questionnaires' class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 min-w-auto">
        @forelse ($questionnaires as $questInstance)
            <article class="bg-white shadow-xl flex flex-col p-8 rounded-2xl m-2 min-w-auto justify-between">
                <h3 class="text-base md:text-lg font-semibold pb-4 pr-4">{{$questInstance->title}}</h3>
                <p class="text-sm md:text-base">{{$questInstance->description}}</p>
                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 mt-6 self-center min-w-auto max-w-9/10 text-center justify-self-end-safe self-center" name="questionnaire" href="{{ route('questionnaires.show', $questInstance->id) }}">Take questionnaire!</a>
            </article>
        @empty
            <p class="m-2 text-base md:text-lg">No questionnaires available at this time</p>
        @endforelse
    </section>
@endsection