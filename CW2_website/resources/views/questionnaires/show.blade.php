@extends('layouts.main')

@section('page-title', 'Questionnaire website - show questionnaire')
@section ('h1-title', 'Questionnaire view')


@section('main-content')
    <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    <p class="m-2">{{$questionnaire->description}}</p>
    <em class="m-2">{{$questionnaire->consent}}</em>
    <br>
    <small class="m-2">Required fields are indicated with an asterisk (*)</small>
    @if ($questionnaire->status != 'Live' && $questionnaire->user_id == auth()->id())
        <section class="flex flex-col items-start">
            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 mt-6 min-w-auto max-w-sm text-center justify-self-end-safe" href="{{ route('questionnaires.edit', $questionnaire->id) }}">Edit questionnaire details</a>
            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 mt-6 min-w-auto max-w-sm text-center justify-self-end-safe" href="{{ route('questions.create', $questionnaire->id) }}">New question</a>
        </section>
    @endif
    <section id="questions" class="flex flex-col justify-between">
    @php
        $question_number = 1
    @endphp
        @forelse ($questions as $question)
            @php
                if ($question->required == 'Y')
                    $required = '*'
            @endphp
            <article class="bg-white border border-darkgreen rounded-md mx-2 mt-6 p-5 lg:max-w-4/5">
                <form action="{{ route('responses.store', $questionnaire->id) }}" method="POST">
                @csrf
                <h3 class="text-base md:text-lg mb-4">{{$question_number}}. {{$question->text}} {{$required}}</h3>
                @switch($question->type)
                    @case('Short-text')
                        <input type="text" name="text_answer" id="text_answer" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="Short text answer" autocomplete="off">
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        @break
                    @case('Long-text')
                        <textarea type="text" name="text_answer" id="text_answer" rows="5" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4 resize-y" placeholder="Long text answer"></textarea>
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        @break
                    @case('Tick-one')
                        <ul>
                            @foreach ($question->questionOptions as $option)
                            @php
                                $optionNumber = $loop->iteration;
                            @endphp
                            <li class="py-2 m-2 flex justify-start content-center flex-wrap items-center">
                                <input type="radio" id="selection" name="selection" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                                <label for="question{{$question_number}}-option{{$option->id}}" class="inline-block text-sm md:text-base align-middle self-center">{{$option->text}}</label>
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                            </li>
                            @endforeach
                        </ul>
                        @break
                    @case('Tick-many')
                        <ul>
                            @foreach ($question->questionOptions as $option)
                            @php
                                $optionNumber = $loop->iteration;
                            @endphp
                            <li class="py-2 m-2 flex justify-start content-center flex-wrap items-center">
                                <input type="checkbox" id="selection" name="selection" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                                <label for="question{{$question_number}}-option{{$option->id}}" class="inline-block text-sm md:text-base align-middle self-center">{{$option->text}}</label>
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                            </li>
                            @endforeach
                        </ul>
                        @break
                    @case('Grid')
                        <section class="grid grid-flow-row-dense auto-cols-max auto-rows-max justify-items-center-safe items-center">
                            <p class="col-1 row-1">
                            @foreach ($question->columnValues as $column)
                                <p class="col-{{$loop->iteration + 1}} row-1 px-2 justify-self-center-safe self-center-safe">{{$column->text}}</p>
                            @endforeach
                            @foreach ($question->questionOptions as $option)
                                @php
                                    $optionNumber = $loop->iteration;
                                @endphp
                                <p class="text-sm md:text-base self-center justify-self-start col-1 row-{{$optionNumber + 1}} pr-5 my-1 md:my-3">{{$option->text}}</p>
                                @foreach ($question->columnValues as $column)
                                    <input type="radio" aria-label="{{$option->text}} - Option {{$loop->iteration}}" id="question{{$question->id}}-option{{$option->id}}-column{{$column->id}}" name="question{{$question->id}}-row{{$optionNumber}}" class="min-h-4 h-2/5 w-auto aspect-square mx-1 md:mx-3 row-{{$optionNumber + 1}} col-{{$loop->iteration + 1}} justify-self-center-safe self-center-safe" value="column{{$column->id}}">
                                @endforeach
                            @endforeach
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                        </section>
                        @break
                    @case('Range')
                        <section class="flex">
                            <input type="range" name="question{{$question->id}}" id="question{{$question->id}}" class="border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden block w-full mr-2 md:mr-4 my-2 md:my-5 rounded-l-lg basis-9/10" oninput="this.nextElementSibling.value = this.value">
                            <output for="rangeanswer" class="inline-block border border-darkgreen border-md border-1 basis-1/10 pt-3 p-2 min-w-12 mx-2 text-center min-h-12"></output>
                        </section>
                        @break
                @endswitch
                @php
                    $question_number += 1
                @endphp
                <button class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform min-w-auto m-2 float-right">Submit answer</button>
                </form>
            </article>
            @if ($questionnaire->status != 'Live' && $questionnaire->user_id == auth()->id())
                <article id="actions" class="flex justify-between mb-6 px-2 lg:max-w-4/5">
                    <div class="max-w-8/10 h-auto flex">
                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('questions.edit', [$questionnaire, $question]) }}">Edit question</a>
                        @switch($question->type)
                            @case('Tick-one')
                            @case('Tick-many')
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.create', [$questionnaire->id, $question->id]) }}">Add an option</a>
                                @if ($question->question_options_count != 0)
                                    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.show', [$questionnaire->id, $question->id]) }}">Edit options</a>
                                @endif
                                @break
                            @case('Grid')
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.create', [$questionnaire->id, $question->id]) }}">Add options</a>
                                @if ($question->question_options_count != 0)
                                    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.show', [$questionnaire->id, $question->id]) }}">Edit options</a>
                                @endif
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('columns.create', [$questionnaire->id, $question->id]) }}">Add column values</a>
                                @if ($question->column_values_count != 0)
                                    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('columns.show', [$questionnaire->id, $question->id]) }}">Edit column values</a>
                                @endif
                                @break
                            @case('Range')
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('range.edit', [$questionnaire->id, $question->id, $question->sliderValue->id]) }}">Edit range values</a>
                                @break
                        @endswitch
                    </div>
                    <form action="{{ route('questions.destroy', [$questionnaire->id, $question->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');" class="max-w-2/10 h-auto flex">
                        @csrf
                        @method('DELETE')
                        <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform mt-3 mb-6 self-center max-w-9/10 text-center justify-self-end-safe self-center min-w-25 max-h-4/5">Delete</button>
                    </form>
                </article>
            @endif
        @empty
            <p class="m-2 text-sm md:text-base">This questionnaire has no questions.</p>
        @endforelse
        @if ($questionnaire->status == 'Live')
            <button class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform min-w-auto m-2 float-right">Complete questionnaire</button>
        @endif
    </section>
@endsection