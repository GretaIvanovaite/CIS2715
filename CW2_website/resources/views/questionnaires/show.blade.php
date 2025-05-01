@extends('layouts.main')

@section('page-title', 'Questionnaire website - show questionnaire')
@section ('h1-title', 'Questionnaire view')


@section('main-content')
    <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    <section class="m-2">
        <p>{{$questionnaire->description}}</p>
    </section>
    <section id="questions" class="flex flex-col justify-around">
    @php
        $question_number = 1
    @endphp
    @forelse ($questions as $question)
        <article class="bg-white border border-darkgreen rounded-md mx-2 my-5 p-5 lg:max-w-4/5">
            <h3 class="text-base md:text-lg mb-4">{{$question_number}}. {{$question->text}}</h3>
            @switch($question->type)
                @case('Short-text')
                    <input type="text" name="textanswer" id="textanswer" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="Short text answer" autocomplete="off">
                    @break
                @case('Long-text')
                    <textarea type="text" id="textanswer" name="textanswer" rows="5" required class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4 resize-none" placeholder="Long text answer"></textarea>
                    @break
                @case('Tick-one')
                    <ul>
                        @foreach ($question->questionOption as $option)
                        @php
                            $optionNumber = $loop->iteration;
                        @endphp
                        <li class="py-2 m-2 flex justify-start content-center flex-wrap">
                            <input type="radio" id="option{{$optionNumber}}" name="question{{$question_number}}" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                            <label for="option{{$optionNumber}}" class="text-sm md:text-base align-middle self-center">{{$option->text}}</label>
                        </li>
                        @endforeach
                    </ul>
                    @break
                @case('Tick-many')
                    <ul>
                        @foreach ($question->questionOption as $option)
                        @php
                            $optionNumber = $loop->iteration;
                        @endphp
                        <li class="py-2 m-2 flex justify-start content-center flex-wrap">
                            <input type="checkbox" id="option{{$optionNumber}}" name="question{{$optionNumber}}" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                            <label for="option{{$optionNumber}}" class="inline-block text-sm md:text-base align-middle self-center">{{$option->text}}</label>
                        </li>
                        @endforeach
                    </ul>
                    @break
                @case('Grid')
                    <section class="grid grid-flow-row-dense auto-cols-max auto-rows-max justify-items-center-safe items-center">
                        <p class="col-1 row-1">
                        @foreach ($question->columnValue as $column)
                            <p class="col-{{$loop->iteration + 1}} row-1 px-2 justify-self-center-safe self-center-safe">{{$column->text}}</p>
                        @endforeach
                        @foreach ($question->questionOption as $row)
                            @php
                                $rowNumber = $loop->iteration;
                            @endphp
                            <label for="row{{$rowNumber}}" class="text-sm md:text-base self-center justify-self-start col-1 row-{{$rowNumber + 1}} pr-5 my-1 md:my-3">{{$row->text}}</label>
                            @foreach ($question->columnValue as $column)
                                <input type="radio" id="row{{$rowNumber}}" name="question{{$question_number}}-row{{$rowNumber}}" value="{{$column->text}}" class="min-h-4 h-2/5 w-auto aspect-square mx-1 md:mx-3 row-{{$rowNumber + 1}} col-{{$loop->iteration + 1}} justify-self-center-safe self-center-safe">
                            @endforeach
                        @endforeach
                    </section>
                    @break
                @case('Range')
                    <section class="flex">
                        <input type="range" name="rangeanswer" id="rangeanswer" class="border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden block w-full mr-2 md:mr-4 my-2 md:my-5 rounded-l-lg basis-9/10" oninput="this.nextElementSibling.value = this.value">
                        <output for="rangeanswer" class="border border-darkgreen border-md border-1 basis-1/10 p-2 min-w-12 mx-2 text-center align-middle justify-self-center-safe self-center-safe min-h-12"></output>
                    </section>
                    @break
            @endswitch
            @php
                $question_number += 1
            @endphp
        </article>
    @empty
        <p class="m-2 text-sm md:text-base">This questionnaire has no questions.</p>
    @endforelse
    </section>
@endsection