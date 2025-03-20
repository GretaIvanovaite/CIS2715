@extends('layouts.base_layout')

@section('page-title', 'My Online Resume - Skills')

@section('h1', 'My Skills')
@section('includes.header')

@section('includes.navigation')

@section('main-content')
    <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">My skills</h2>
    <ul class='list-["\0269C"] list-inside'>
        <li class='pt-2'>Ability to use Jira boards and ticketing system</li>
        <li class='pt-2'>Knowledge of software development process</li>
        <li class='pt-2'>Great conversation</li>
        <li class='pt-2'>Some knowledge of coding languages, such as JavaScript, Python, Java and more!</li>
    </ul>

    <section class="pt-12 pb-12">
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">My skills from the database</h2>
        <table class="table-auto pl-6 border-2 border-solid">
            <thead class="bg-cyan-900 text-white font-bold">
                <tr class="divide-x-3 divide-solid pb-6">
                    <th class="p-4">Skill</th>
                    <th class="p-4">Details</th>
                    <th class="p-4">Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr class="divide-x-2 border-y-2 border-solid divide-3 divide-solid">
                        <td class="p-4">{{$skill->title}}</td>
                        <td class="p-4">{{$skill->detail}}</td>
                        <td class="p-4 text-center text-6x1">
                            @foreach (range(1, $skill->stars) as $star)
                                &#x2605;
                            @endforeach
                        </td>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('includes.footer')
