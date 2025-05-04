@extends('layouts.main')

@section('page-title', 'Questionnaire website - show questionnaire')
@section ('h1-title', 'Questionnaire view')


@section('main-content')
    <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    <p class="m-2">{{$questionnaire->description}}</p>
    @if ($questionnaire->status != 'Live') {{--&& $questionnaire->user_id == $auth()->user()->id)--}}
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
        <article class="bg-white border border-darkgreen rounded-md mx-2 mt-6 p-5 lg:max-w-4/5">
            <h3 class="text-base md:text-lg mb-4">{{$question_number}}. {{$question->text}}</h3>
            @switch($question->type)
                @case('Short-text')
                    <input type="text" name="question{{$question_number}}" id="question{{$question_number}}" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="Short text answer" autocomplete="off">
                    @break
                @case('Long-text')
                    <textarea type="text" id="question{{$question_number}}" name="question{{$question_number}}" rows="5" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4 resize-y" placeholder="Long text answer"></textarea>
                    @break
                @case('Tick-one')
                    <ul>
                        @foreach ($question->questionOptions as $option)
                        @php
                            $optionNumber = $loop->iteration;
                        @endphp
                        <li class="py-2 m-2 flex justify-start content-center flex-wrap items-center">
                            <input type="radio" id="question{{$question_number}}-option{{$optionNumber}}" name="question{{$question_number}}" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                            <label for="question{{$question_number}}-option{{$optionNumber}}" class="inline-block text-sm md:text-base align-middle self-center">{{$option->text}}</label>
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
                            <input type="checkbox" id="question{{$question_number}}-option{{$optionNumber}}" name="question{{$optionNumber}}" value="{{$option->text}}" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3">
                            <label for="question{{$question_number}}-option{{$optionNumber}}" class="inline-block text-sm md:text-base align-middle self-center">{{$option->text}}</label>
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
                        @foreach ($question->questionOptions as $row)
                            @php
                                $rowNumber = $loop->iteration;
                            @endphp
                            <p class="text-sm md:text-base self-center justify-self-start col-1 row-{{$rowNumber + 1}} pr-5 my-1 md:my-3">{{$row->text}}</p>
                            @foreach ($question->columnValues as $column)
                                <input type="radio" aria-label="{{$row->text}} - Option {{$loop->iteration}}" id="question{{$question_number}}-row{{$rowNumber}}-option{{$loop->iteration}}" name="question{{$question_number}}-row{{$rowNumber}}-option{{$loop->iteration}}" class="min-h-4 h-2/5 w-auto aspect-square mx-1 md:mx-3 row-{{$rowNumber + 1}} col-{{$loop->iteration + 1}} justify-self-center-safe self-center-safe">
                            @endforeach
                        @endforeach
                    </section>
                    @break
                @case('Range')
                    <section class="flex">
                        <input type="range" name="rangeanswer" id="rangeanswer" class="border focus:border-transparent border-gray-300 text-xs md:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden block w-full mr-2 md:mr-4 my-2 md:my-5 rounded-l-lg basis-9/10" oninput="this.nextElementSibling.value = this.value">
                        <output for="rangeanswer" class="inline-block border border-darkgreen border-md border-1 basis-1/10 pt-3 p-2 min-w-12 mx-2 text-center min-h-12"></output>
                    </section>
                    @break
            @endswitch
            @php
                $question_number += 1
            @endphp
        </article>
        @if ($questionnaire->status != 'Live') {{--&& $questionnaire->user_id == $auth()->user()->id)--}}
            <article id="actions" class="flex justify-between mb-6 px-2 lg:max-w-4/5">
                <div class="max-w-7/10 h-auto flex">
                    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('questions.edit', [$questionnaire, $question]) }}">Edit question</a>
                    @switch($question->type)
                        @case('Tick-one')
                        @case('Tick-many')
                            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.create', [$questionnaire->id, $question->id]) }}">Add options</a>
                            @if ($question->question_options_count != 0)
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.edit', [$questionnaire->id, $question->id]) }}">Edit options</a>
                            @endif
                            @break
                        @case('Grid')
                            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.create', [$questionnaire->id, $question->id]) }}">Add options</a>
                            @if ($question->question_options_count != 0)
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('options.edit', [$questionnaire->id, $question->id]) }}">Edit options</a>
                            @endif
                            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('columns.create', [$questionnaire->id, $question->id]) }}">Add column values</a>
                            @if ($question->column_values_count != 0)
                                <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('columns.edit', [$questionnaire->id, $question->id]) }}">Edit column values</a>
                            @endif
                            @break
                        @case('Range')
                            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2" href="{{ route('range.edit', [$questionnaire->id, $question->sliderValue]) }}">Edit range values</a>
                            @break
                    @endswitch
                </div>
                <form action="{{ route('questions.destroy', [$questionnaire->id, $question->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');" class="max-w-3/10 h-auto flex">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform mt-3 mb-6 self-center max-w-9/10 text-center justify-self-end-safe self-center min-w-25 max-h-4/5">Delete</button>
                </form>
            </article>
        @endif
    @empty
        <p class="m-2 text-sm md:text-base">This questionnaire has no questions.</p>
    @endforelse
    </section>
@endsection