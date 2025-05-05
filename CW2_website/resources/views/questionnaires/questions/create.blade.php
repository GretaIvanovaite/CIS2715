@extends('layouts.main')

@section('page-title', 'Question website - create question')
@section ('h1-title', 'Question creation')


@section('main-content')
    <small><a class="text-darkgreen hover:underline mb-5" href="{{ route('questionnaires.show', $questionnaire->id) }}">Back to the questionnaire</a></small>
   <section id='create_question' class="flex flex-col w-full lg:w-1/2 mx-auto p-8 lg:p-10 rounded-2xl shadow-xl bg-white">
        <h2 class="text-lg md:text-xl font-bold pb-8 my-auto">Please enter the details below</h2>
        <form class="flex flex-col" id="question_form" method="POST" action="{{ route('questions.store', $questionnaire->id) }}">
            @csrf
            <label for="text" class="block mb-2 text-sm md:text-base font-medium text-black">Question text</label>
            @error('text')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <input type="text" name="text" id="text" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" required>
            <label for="type" class="block mb-2 text-sm md:text-base font-medium text-black">Question type</label>
            @error('type')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <select id="type" name="type" class="mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4">
                <option value="">Please choose one of the available question types</option>
                <option value="Short-text">Short open-ended text question</option>
                <option value="Long-text">Long open-ended text question</option>
                <option value="Tick-one">Multi-choice question with one answer</option>
                <option value="Tick-many">Multi-choice question with multiple answers</option>
                <option value="Grid">Multi-choice grid/matrix question</option>
                <option value="Range">Range value question with a slider</option>
            </select>
            <section class="py-2 m-2 flex justify-start content-center flex-wrap items-center">
                <input type="checkbox" name="required" id="required" value="Y" class="min-h-4 h-full w-auto aspect-square mr-1 md:mr-3 align-middle">
                <label for="again" class="inline-block text-sm md:text-base align-middle self-center">Required?</label>
            </section>
            <input type="hidden" name="questionnaire_id" id="questionnaire_id" value={{$questionnaire->id}} required>
            <button type="submit" class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-1/5 max-w-9/10">Create</button>
        </form>
    </section>
@endsection