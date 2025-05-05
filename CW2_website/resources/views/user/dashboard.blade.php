@extends('layouts.main')

@section('page-title', 'Questionnaire website - User Dashboard')
@section ('h1-title', 'Dashboard')


@section('main-content')
 <h2 class="text-lg md:text-xl pb-4 m-2 font-bold">Your questionnaires</h2>
    <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white active:scale-95 transition-transform transform m-2 self-center min-w-auto max-w-9/10" href="{{ route('questionnaires.create') }}">New questionnaire</a>
    @if ($questionnaires->isEmpty())
        <p class="m-2 mt-10">You have no questionnaires at this time.</p>
    @else
        <section id='questionnaires_table' class="max-w-full">
            @forelse ($questionnaires as $questInstance)
                @if ($loop->first)
                    <table class="mx-2 my-8 table-fixed divide-y-1">
                        <thead class="bg-mediumgreen">
                            <tr>
                                <th scope="col" class="px-2 py-4 w-2/10">Title</th>
                                <th scope="col" class="px-2 py-4 w-3/10">Description</th>
                                <th scope="col" class="px-2 py-4 w-2/10">Status</th>
                                <th scope="col" class="px-2 py-4 w-1/10">Responses</th>
                                <th scope="col" class="px-2 py-4 w-2/10">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border-darkgreen divide-y-1">
                @endif
                            <tr class="border-darkgreen">
                                <th scope="row" class="font-semibold text-left p-2 text-pretty">{{$questInstance->title}}</th>
                                <td class="text-sm md:text-base text-left p-2 text-pretty wrap-break-word">{{$questInstance->description}}</td>
                                <td class="text-sm md:text-base text-center p-2 text-pretty font-semibold">{{$questInstance->status}}</td>
                                <td class="text-sm md:text-base text-center p-2 text-pretty">{{ $questInstance->responses_count }}</td>
                                <td class="text-sm md:text-base p-2 justify-items-center flex flex-col">
                                    @if ($questInstance->status == 'Live')
                                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5" href="{{ route('questionnaires.show', $questInstance->id) }}">Respondent view</a>
                                        <form action="{{ route('questionnaires.status', $questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to close this questionnaire?');" class="w-full flex justify-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" id="status" value="Closed">
                                            <button class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5">Stop responses</button>
                                        </form>
                                    @else
                                        <form action="{{ route('questionnaires.status', $questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to make this questionnaire live?');" class="w-full flex justify-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" id="status" value="Live">
                                            <button class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5">Make live</button>
                                        </form>
                                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5" href="{{ route('questionnaires.show', $questInstance->id) }}">Edit</a>
                                    @endif
                                    @if ($questInstance->responses_count > 0)
                                        <a class="cursor-pointer bg-brightgreen text-black font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:text-white hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5" href="">See responses</a>
                                    @endif
                                    <form action="{{ route('questionnaires.destroy', $questInstance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this questionnaire?');" class="w-full flex justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button class="cursor-pointer bg-[#C1121F] text-white font-semibold text-sm md:text-base uppercase rounded-lg p-2 hover:bg-darkgreen hover:font-bold active:scale-95 transition-transform transform m-2 self-center min-w-3/5 max-w-9/10 text-center w-4/5">Delete</button>
                                    </form>
                                </td>
                            </tr>
            @empty
                <p class="m-2">You have no questionnaires at this time.</p>
            @endforelse
                        </tbody>
                    </table>
        </section>
    @endif
@endsection