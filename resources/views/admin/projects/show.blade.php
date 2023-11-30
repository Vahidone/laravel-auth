
@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    <div class="w-50">
        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        <p>{{ $project->image_original_name }}</p>
    </div>

    <p>{{ $project->text }}</p>
    <p>Data: {{ $project->release_date }}</p>
    <p>{{ $project->description }}</p>

@endsection
