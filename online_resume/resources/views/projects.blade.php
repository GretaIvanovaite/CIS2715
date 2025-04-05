@extends('layouts.base_layout')

@section('page-title', 'Software Projects')

@section('h1', 'Software Projects')
@section('includes.header')

@section('includes.navigation')

@section('main-content')
    @forelse ($projects as $project)
        <article>
            <h2 class="p-6 pl-0 text-xl font-bold text-cyan-800">{{$project->title}}</h2>
            <p><strong>Description:</strong>{{$project->description}}</p>
            <p><strong>Technologies:</strong>{{$project->technologies}}</p>
        </article>
    @empty
        <p>No projects available at this time</p>
    @endforelse
@endsection

@section('includes.footer')

