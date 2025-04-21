@extends('layouts.main')

@section('page-title', 'Questionnaire website - Home')
@section ('h1-title', 'Home')


@section('main-content')
 <h2>Welcome to Greta's questionnaire website!</h2>
    <section id='questionnaires'>
        @forelse ($questionnaires as $questInstance)
            <a href="">
                <h3>{{$questInstance->title}}</h3>
                <p>{{$questInstance->description}}</p>
                <p>Status: {{$questInstance->status}}</p>
            </a>
        @empty
            <p>No questionnaires available at this time</p>
        @endforelse
    </section>
@endsection