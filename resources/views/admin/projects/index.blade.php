@extends('layouts.admin')


@section('content')


    <main class="main-projects">
        <h1 class="text-center text-white fw-bold mb-5">Lista dei progetti</h1>

        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titolo</th>
                    <th scope="col">decrizione</th>
                    <th scope="col">data</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->release_date }}</td>
                    <td>
                         <a class="btn btn-success" href="{{ route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

        {{ $projects->links() }}

    </main>



@endsection
