@extends('layouts.base_layout')

@section('page-title', 'My Online Resume - About Me')


@section('includes.header')
@section('h1', 'About Me')

@section('includes.navigation')

@section('main-content')
    <section id='quick_facts'>
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Quick facts</h2>
        <table class="table-auto pl-6 divide-x-2">
            <tr class="divide-solid">
                <th class="text-left pr-6">Name</th>
                <td>Greta Ivanovaite</td>
            </tr>
            <tr class="divide-solid">
                <th class="text-left pr-6">Current job</th>
                <td>Associate Content Engineer</td>
            </tr>
            <tr class="divide-solid">
                <th class="text-left pr-6">Education</th>
                <td>Pursuing an undergraduate degree in BSc Web Design, Development and Analytics</td>
            </tr>
            <tr class="divide-solid">
                <th class="text-left pr-6">Personal interests <br>and hobbies</th>
                <td>
                    <ul class='list-["\0269C"] list-inside'>
                        <li>Fantasy/sci-fi media and books</li>
                        <li>Video games</li>
                        <li>Crochet</li>
                    </ul>
                </td>
            </tr>
        </table>
    </section>
    <section id='details'>
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">More about me</h2>
        <p>I am a mature student at the Edge Hill University. I started my degree at the age of 28.</p>
        <p>I am keen to learn about web design and development and I love seeing something I coded finally appear on screen and act like I intended. It makes me proud to see something I created working well.</p>
    </section>
    <section id='experience'>
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">Work experience</h2>
        <ul class='list-["\0269C"] list-inside'>
            @foreach ($experiences as $experience)
                <li class="pb-8">
                    <span class="font-bold">{{$experience->job_title}}</span> | <span class="italic">{{$experience->employer_name}}</span> | {{$experience->start_date}} to 
                    @if (isset ($experience->finish_date))
                        {{$experience->finish_date}}
                    @else
                        Now
                    @endif
                    <ul class="list-disc list-inside">
                        @foreach (explode('; ', $experience->key_skills) as $sentence)
                            <li>{{$sentence}}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </section>
    <section id='qualifications'>
        <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">My qualifications</h2>
        <table class="table-auto pl-6 mb-20 border-2 border-solid">
            <thead class="bg-cyan-900 text-white font-bold">
                <tr class="divide-x-3 divide-solid pb-6">
                    <th class="p-4">Qualification</th>
                    <th class="p-4">Institution</th>
                    <th class="p-4">Completion year</th>
                    <th class="p-4">Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($qualifications as $qualification)
                    <tr class="divide-x-2 border-y-2 border-solid divide-3 divide-solid">
                        <td class="p-4">{{$qualification->course_title}}</td>
                        <td class="p-4">{{$qualification->studied_at}}</td>
                        <td class="p-4">{{$qualification->completion_year}}</td>
                        <td class="p-4">{{ucfirst($qualification->grade)}}</td>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('includes.footer')