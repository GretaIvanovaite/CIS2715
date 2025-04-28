@extends('layouts.main')

@section('page-title', 'Questionnaire website - show questionnaire')
@section ('h1-title', 'Questionnaire view')


@section('main-content')
    <h2 class="text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    <section class="m-2">
        <p>{{$questionnaire->description}}</p>
    </section>
    <section id="questions" class="flex flex-col justify-around">
    @php
        $question_number = 1
    @endphp
    @forelse ($questions as $question)
        <article class="bg-white border border-darkgreen rounded-md mx-2 my-5 px-5 py-10 md:max-w-3/5">
            <h3>{{$question_number}}. {{$question->text}}</h3>
            @switch($question->type)
                @case('Short text')
                    <input type="text" name="textanswer" id="textanswer" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="Short text answer" autocomplete="off">
                    @break
                @case('Long text')
                    <textarea type="text" id="textanswer" name="textanswer" rows="5" required class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4 resize-none" placeholder="Long text answer"></textarea>
                    @break
            @endswitch
            @php
                $question_number += 1
            @endphp
        </article>
    @empty
        <p class="m-2">This questionnaire has no questions.</p>
    @endforelse
    </section>
@endsection