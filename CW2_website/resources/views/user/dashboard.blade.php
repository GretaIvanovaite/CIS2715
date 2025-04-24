@extends('layouts.user')

@section('page-title', 'Questionnaire website - User Dashboard')
@section ('h1-title', 'Dashboard')


@section('main-content')
 <h2 class="text-xl pb-4 m-2 font-bold">Your questionnaires</h2>
    <section id='buttons' class="flex justify-between">
        <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white active:scale-95 transition-transform transform m-2 self-center min-w-auto max-w-9/10">New questionnaire</button>
        <div id="toggle-switch" class="flex">
            <button class="flex flex-row w-full min-w-fit py-1.5 my-auto px-3 text-sm bg-gray-600 text-white gap-2 rounded-lg justify-center">
                <span>Grid</span>
            </button>
            <button class="flex flex-row w-full min-w-fit py-1.5 my-auto px-3 text-sm bg-transparent gap-2 rounded-lg justify-center">
                <span>Table</span>
            </button>
        </div>
    </section>
    <section id='questionnaires_table'>
        <table class="mx-2 my-8 table-fixed divide-y-1">
            <thead class="bg-mediumgreen">
                <tr>
                    <th scope="col" class="px-2 py-4 w-2/10">Title</th>
                    <th scope="col" class="px-2 py-4 w-4/10">Description</th>
                    <th scope="col" class="px-2 py-4 w-1/10">Status</th>
                    <th scope="col" class="px-2 py-4 w-1/10">Responses</th>
                    <th scope="col" class="px-2 py-4 w-2/10">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white border-darkgreen divide-y-1">
                @forelse ($questionnaires as $questInstance)
                    <tr class="border-darkgreen">
                        <th scope="row" class="font-semibold text-left p-2">{{$questInstance->title}}</th>
                        <td class="text-base text-left p-2">{{$questInstance->description}}</td>
                        <td class="text-base text-center p-2">{{$questInstance->status}}</td>
                        <td class="text-base text-center p-2"> Responses </td>
                        <td class="text-base p-2 justify-items-center flex flex-col">
                            @if ($questInstance->status == 'Live')
                                <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10">Stop responses</button>
                            @else
                                <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10">Make Live</button>
                                <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10">Edit</button>
                            @endif
                            <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10">Delete</button>
                        </td>
                    </tr>
                @empty
                    <p class="m-2">You have no questionnaires at this time. Please use the button above to make a questionnaire</p>
                @endforelse
            </tbody>
        </table>
        
    </section>
    <section id='questionnaires' class="grid grid-cols-1 md:grid-cols-3 min-w-auto">
        @forelse ($questionnaires as $questInstance)
            <article class="bg-white shadow-xl flex flex-col p-8 rounded-2xl m-2 min-w-auto">
                <h3 class="text-lg font-semibold pb-4 pr-4">{{$questInstance->title}}</h3>
                <p class="text-base">{{$questInstance->description}}</p>
                <p class="text-base font-bold py-4">Status: {{$questInstance->status}}</p>
                <p class="text-base py-4">Number of responses: </p>
                @if ($questInstance->status == 'Live')
                    <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10">Stop responses</button>
                @else
                    <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10">Make Live</button>
                    <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10">Edit</button>
                @endif
                <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10">Delete</button>
            </article>
        @empty
            <p class="m-2">You have no questionnaires at this time. Please use the button above to make a questionnaire</p>
        @endforelse
    </section>
@endsection