@extends('layouts.main')

@section('page-title', 'Questionnaire website - create questionnaire')
@section ('h1-title', 'Questionnaire creation')


@section('main-content')
   <section id='create_questionnaire' class="flex flex-col w-full lg:w-1/2 mx-auto p-8 lg:p-10 rounded-2xl shadow-xl bg-white">
        <h2 class="text-lg md:text-xl font-bold pb-8 my-auto">Please enter the details below</h2>
        <form class="flex flex-col" id="questionnaire_form" method="POST" action="{{ route('questionnaires.store') }}">
            @csrf
            <label for="title" class="block mb-2 text-sm md:text-base font-medium text-black">Questionnaire title</label>
            @error('title')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <input type="text" name="title" id="title" class="pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" required>
            <label for="description" class="block mb-2 text-sm md:text-base font-medium text-black">Description</label>
            @error('description')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <textarea rows=5 name="description" id="description" class="resize pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4"></textarea>
            <input type="hidden" name="status" id="status" value='In development' required>
            <input type="hidden" name="user_id" id="user_id" value=1 required>
            <label for="consent" class="block mb-2 text-sm md:text-base font-medium text-black">Data handling and consent information</label>
            @error('consent')
                <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
            @enderror
            <textarea rows=5 name="consent" id="consent" class="resize pl-4 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 text-sm md:text-base rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4"></textarea>
            <input type="hidden" name="status" id="status" value='In development' required>
            <input type="hidden" name="user_id" id="user_id" value=1 required>
            <button type="submit" class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-1/5 max-w-9/10">Create</button>
        </form>
    </section>
@endsection