@extends('layouts.admin')


@section('content')

    <main class="main-csm text-center text-white w-100">
        <h1>{{ $project->name}}</h1>
        @php
            $date = date_create($project->release_date);
        @endphp

        <p>Descrizione: {{ $project->description }}</p>
        <p>Data: {{ date_format($date, 'd/m/y') }}</p>


    </main>


@endsection
