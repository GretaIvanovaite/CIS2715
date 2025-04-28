@extends('layouts.user')

@section('page-title', 'Questionnaire website - User Dashboard')
@section ('h1-title', 'Dashboard')


@section('main-content')
 <h2 class="text-xl pb-4 m-2 font-bold">Your questionnaires</h2>
    @if ($questionnaires->isEmpty())
        @php
            $display='hidden'
        @endphp
        <section class="flex justify-between">
            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white active:scale-95 transition-transform transform m-2 self-center min-w-auto max-w-9/10" href="{{ route('questionnaire.create') }}>New questionnaire</a>
        </section>
        <p class="m-2">You have no questionnaires at this time.</p>
    @else
        <section class="flex justify-between">
            <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-auto max-w-9/10" href="{{ route('questionnaire.create') }}">New questionnaire</a>
            <div id="toggle-switch" class="flex m-2">
                <a class="cursor-pointer w-full min-w-fit py-1.5 my-auto px-3 text-sm bg-darkgreen text-white gap-2 rounded-lg justify-center">
                    <span>Grid view</span>
                </a>
                <a class="cursor-pointer flex flex-row w-full min-w-fit py-1.5 my-auto px-3 text-sm bg-mediumgreen text-black gap-2 rounded-lg justify-center">
                    <span>Table view</span>
                </a>
            </div>
        </section>
        <section id='questionnaires_table'>
            @forelse ($questionnaires as $questInstance)
                @if ($loop->first)
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
                @endif
                            <tr class="border-darkgreen">
                                <th scope="row" class="font-semibold text-left p-2">{{$questInstance->title}}</th>
                                <td class="text-base text-left p-2">{{$questInstance->description}}</td>
                                <td class="text-base text-center p-2">{{$questInstance->status}}</td>
                                <td class="text-base text-center p-2"> Responses </td>
                                <td class="text-base p-2 justify-items-center flex flex-col">
                                    @if ($questInstance->status == 'Live')
                                        <form action="{{ route('questionnaire.update',$questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to close this questionnaire to responders?');" class="w-full flex justify-center">
                                        @csrf
                                        @method('PATCH')
                                            <input type="hidden" name="status" value="Closed">
                                            <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center">Stop responses</button>
                                        </form>
                                    @else
                                        <form action="{{ route('questionnaire.update', $questInstance->status=='Live',$questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to make this questionnaire live?');" class="w-full flex justify-center">
                                        @csrf
                                        @method('PATCH')
                                            <button class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center">Make Live</button>
                                        </form>
                                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center" href="{{ route('questionnaire.edit', $questInstance->id) }}">Edit</a>
                                    @endif
                                    <form action="{{ route('questionnaire.destroy', $questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this questionnaire?');" class="w-full flex justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center">Delete</button>
                                    </form>
                                </td>
                            </tr>
            @empty
                <p class="m-2">You have no questionnaires at this time.</p>
            @endforelse
                        </tbody>
                    </table>
        </section>

        <section id='questionnaires' class="grid grid-cols-1 md:grid-cols-3 min-w-auto">
            @foreach ($questionnaires as $questInstance)
                <article class="bg-white shadow-xl flex flex-col p-8 rounded-2xl m-2 min-w-auto">
                    <h3 class="text-lg font-semibold pb-4 pr-4">{{$questInstance->title}}</h3>
                    <p class="text-base">{{$questInstance->description}}</p>
                    <p class="text-base font-bold py-4">Status: {{$questInstance->status}}</p>
                    <p class="text-base pb-6">Number of responses: </p>
                    <section id="actions" class="flex flex-col justify-self-end-safe">
                    @if ($questInstance->status == 'Live')
                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10 text-center">Stop responses</a>
                    @else
                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10 text-center">Make Live</a>
                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10 text-center">Edit</a>
                    @endif
                    <a class="cursor-pointer bg-[#C1121F] text-white font-semibold text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-2/5 max-w-9/10 text-center">Delete</a>
                    </section>
                </article>
            @endforeach
        </section>
    @endif
@endsection