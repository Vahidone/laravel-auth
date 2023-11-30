@extends('layouts.admin')


@section('content')


    <main class="main-csm">
        <h1 class="text-center text-white fw-bold mb-5">Project List</h1>

        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th class="fw-bold fs-5">ID</th>
                    <th class="fw-bold fs-5">Title</th>
                    <th class="fw-bold fs-5">Description</th>
                    <th class="fw-bold fs-5">Date</th>
                    <th class="fw-bold fs-5">Action</th>
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
                         <a class="btn btn-success d-inline-block" href="{{ route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a>
                         <a class="btn btn-warning" href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>



        {{ $projects->links() }}



    </main>



@endsection
