@extends('layouts.main')

@section('page-title', 'Questionnaire website - column values')
@section ('h1-title', 'Column values')


@section('main-content')
    <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">Please review the column values</h2>
    <p class="text-base md:text-lg mb-4 col-span-3 font-semibold m-2">Question: {{$question->text}}</p>
    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform min-w-auto text-center justify-self-end-safe self-center m-2 mb-6" href="{{ route('columns.create', [$questionnaire->id, $question->id]) }}">Add a column value</a>
    <section class="bg-white rounded-sm mx-2 my-6 p-5 lg:max-w-4/5 divide-y-1">
    @foreach ($question->columnValues as $column)
        <article class="grid grid-cols-3 content-center justify-center-safe">
            <p class="text-base md:text-lg mb-4 col-1 align-middle justify-self-start">{{$column->text}}</p>
            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform self-center min-w-auto text-center justify-self-end-safe self-center mt-3 mb-6 mr-2 col-2 align-middle self-center" href="{{ route('columns.edit', [$questionnaire->id, $question->id, $column->id]) }}">Edit</a>
            <form action="{{ route('columns.destroy', [$questionnaire->id, $question->id, $column->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this column value?');" class="col-3 align-middle self-center">
                @csrf
                @method('DELETE')
                <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform mt-3 mb-6 self-center max-w-9/10 text-center justify-self-end-safe self-center min-w-25 max-h-4/5">Delete</button>
            </form>
        </article>
    @endforeach
    </section>
@endsection