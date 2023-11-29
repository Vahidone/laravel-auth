@extends('layouts.admin')


@section('content')

    @include('admin.partials.functions')

    <main class="main-csm">


        <h1 class="text-center text-white fw-bold mb-4">Technologies</h1>

        <div class="row d-flex justify-content-center">

            <div class="col-6">

                @if (session('error'))
                    <div id="alert-message"  class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>

                @endif

                @if (session('success'))

                    <div id="alert-message"  class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>

                @endif


                <form action="{{ route('admin.technologies.store')}}" method="POST">
                    @csrf

                    <div class="input-group mb-3 mt-4">
                        <input type="text" class="form-control" placeholder="New technology" name="name">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                    </div>
                </form>




                <table class="table table-dark table-striped text-center">
                    <thead>
                        <tr>
                            <th class="fs-5 fw-bold">Name</th>
                            <th class="fs-5 fw-bold">Action</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($technologies as $technology)

                            <tr>

                                <td>{{ $technology->name}}</td>
                                <td>
                                    <form action="{{ route('admin.technologies.destroy', $technology->id)}}"    method="POST" onsubmit="return confirm('sei sicuro di voler eliminare questa technologia?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" ><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>



    </main>



@endsection
