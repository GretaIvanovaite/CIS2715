@extends('layouts.main')

@section('page-title', 'Questionnaire website - Home')
@section ('h1-title', 'Home')


@section('main-content')
 <h2 class="text-xl pb-8 font-bold">Available questionnaires</h2>
    <section id='questionnaires'>
        @forelse ($questionnaires as $questInstance)
            <article class="bg-white shadow-xl flex flex-col p-8 rounded-2xl max-w-1/3">
                <h3 class="text-lg font-semibold pb-4 pr-4">{{$questInstance->title}}</h3>
                <p class="text-base">{{$questInstance->description}}</p>
                <p class="text-base font-bold py-4">Status: {{$questInstance->status}}</p>
                <button class="cursor-pointer bg-brightgreen text-black max-w-4/5 font-bold text-base uppercase rounded-lg p-4 hover:bg-darkgreen hover:text-white active:scale-95 transition-transform transform m-2 self-center">Take questionnaire!</button>
            </article>
        @empty
            <p>No questionnaires available at this time</p>
        @endforelse
    </section>
@endsection