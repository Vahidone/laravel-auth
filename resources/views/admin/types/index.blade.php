
@extends('layouts.admin')

@section('content')

<main class="main-csm w-100">
    <h1 class="text-center text-white fw-bold mb-5">Types</h1>

    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th class="fs-5 fw-bold">ID</th>
                <th class="fs-5 fw-bold">Title</th>
                <th class="fs-5 fw-bold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->title }}</td>
                <td>xxx</td>


            </tr>
            @endforeach


        </tbody>
    </table>



</main>


@endsection
