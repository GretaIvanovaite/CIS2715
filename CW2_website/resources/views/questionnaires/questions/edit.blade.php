@extends('layouts.main')

@section('page-title', 'Question website - edit question text')
@section ('h1-title', 'Edit question')


@section('main-content')
    <small><a class="text-darkgreen hover:underline mb-5" href="{{ route('questionnaires.show', $questionnaire->id) }}">Back to the questionnaire</a></small>
   <section id='create_question' class="flex flex-col w-full lg:w-1/2 mx-auto p-8 lg:p-10 rounded-2xl shadow-xl bg-white">
        <h2 class="text-lg md:text-xl font-bold pb-8 my-auto">Please edit the details below</h2>
        <form class="flex flex-col" id="question_form" method="POST" action="{{ route('questions.update', [$questionnaire->id, $question->id]) }}">
            @csrf
            @method('PATCH')
            <label for="text" class="block mb-2 text-sm md:text-base font-medium text-black">Question text</label>
            @error('text')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <input type="text" name="text" id="text" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" value="{{ old('text') !== null ? old('text') : $question->text }}" required>
            <button type="submit" class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-1/5 max-w-9/10">Update</button>
        </form>
    </section>
@endsection