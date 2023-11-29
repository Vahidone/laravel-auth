
@extends('layouts.admin')

@section('content')

<main class="main-projects w-100">
    <h1 class="text-center text-white fw-bold mb-5">Types</h1>

    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">titolo</th>
                <th scope="col">Azioni</th>
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
