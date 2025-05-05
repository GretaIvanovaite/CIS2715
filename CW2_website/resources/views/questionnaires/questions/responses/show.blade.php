@extends('layouts.main')

@section('page-title', 'Questionnaire website - Responses')
@section ('h1-title', 'Questionnaire responses')


@section('main-content')
 <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    @if ($questionnaire->responses->isEmpty())
        <p class="m-2 mt-10">You have no responses at this time</p>
    @else
        <section id='responses_table' class="max-w-full">
            @foreach ($questionnaire->responses as $response)
                @if ($loop->first)
                    <table class="mx-2 my-8 table-fixed divide-y-1">
                        <thead class="bg-mediumgreen">
                            <tr>
                                <th scope="col" class="px-2 py-4 w-2/10">Question</th>
                                <th scope="col" class="px-2 py-4 w-3/10">Option</th>
                                <th scope="col" class="px-2 py-4 w-2/10">Selection</th>
                                <th scope="col" class="px-2 py-4 w-1/10">Textual answer</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border-darkgreen divide-y-1">
                @endif
                            <tr class="border-darkgreen">
                                <td scope="row" class="font-semibold text-left p-2 text-pretty wrap-break-word">{{$questionnaire->questions['id'=>$response->question_id]->text}}</td>
                                <td scope="row" class="font-semibold text-left p-2 text-pretty wrap-break-word">{{$questionnaire->questions->options['id'=>$response->option_id]->text}}</td>
                                <td scope="row" class="font-semibold text-left p-2 text-pretty wrap-break-word">{{$response->selection}}</td>
                                <td scope="row" class="font-semibold text-left p-2 text-pretty wrap-break-word">{{$response->text_answer}}</td>
                            </tr>
            @endforeach
                        </tbody>
                    </table>
        </section>
    @endif
@endsection