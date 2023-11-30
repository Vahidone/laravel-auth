@extends('layouts.admin')


@section('content')

    @include('admin.partials.functions')

    <main class="main-csm">


        <h1 class="text-center text-white fw-bold mb-4">Technologies</h1>

        <div class="row d-flex justify-content-center">

            <div class="col-6">

                @if ($errors->any())


                    <div class="alert alert-warning" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif


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


                <form action="{{ route('admin.technologies.store')}}" method="POST" class="mb-5">
                    @csrf

                    <div class="input-group mb-3 mt-4">
                        <input type="text" class="form-control" placeholder="New technology" name="name">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                    </div>
                </form>




                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th class="fs-5 fw-bold">Name</th>
                            <th class="fs-5 fw-bold">Action</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($technologies as $technology)

                            <tr>

                                <td>
                                    <form action="{{ route('admin.technologies.update', $technology)}}" method="POST" id="form-edit">
                                        @csrf
                                        @method('PUT')


                                        <input type="text" class="form-hidden bg-dark text-white" value="{{ $technology->name}}" name="name">

                                    </form>
                                </td>


                                <td>

                                    <button onclick="submitForm()" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>

                                   @include('admin.partials.form-delete', [
                                    'route' => route('admin.technologies.destroy', $technology),
                                    'message' => 'sei sicuro di voler eliminare questa technologia?'
                                   ])


                                </td>

                            </tr>

                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>



    </main>

    <script>

        function submitForm() {
            const form = document.getElementById('form-edit');
            form.submit();

        }
    </script>



@endsection
