@extends('layouts.main')

@section('page-title', 'Questionnaire website - completing questionnaire')
@section ('h1-title', 'Introductory page')


@section('main-content')
    <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">{{$questionnaire->title}}</h2>
    <br>
    <small class="m-2">Required fields are indicated with an asterisk (*)</small>
    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform min-w-auto m-2 float-right"
    href="{{ route('questions.show', [$questionnaire->id, $questionnaire->questions->first()->id]) }}">
    Start Questionnaire</a>
    </form>
    </section>
@endsection