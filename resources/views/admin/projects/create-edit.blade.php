@extends('layouts.admin')

@section('content')

<div class="main-csm">


    <h1 class="text-white mb-4">{{ $title }}</h1>


@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>

        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>
@endif



<div class="row">
    <div class="col-8">
        <form
          action="{{ $route }}"
          method="POST"
          enctype="multipart/form-data"
        >
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="title" class="form-label text-white">Titolo Progetto *</label>
                <input
                  id="title"
                  class="form-control @error('title') is-invalid @enderror"
                  name="title"
                  type="text"
                  value="{{ old('title', $project?->title) }}"
                >
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label text-white">Data</label>
                <input
                  id="release_date"
                  class="form-control @error('release_date') is-invalid @enderror"
                  name="release_date"
                  type="text"
                  value="{{ old('release_date', $project?->release_date) }}"
                >
                @error('release_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label text-white">Immagine</label>
                <input
                  id="image"
                  class="form-control @error('image') is-invalid @enderror"
                  name="image"
                  type="file"
                  value="{{ old('image', $project?->image) }}"
                >
                @error('image')
                    <p class="text-danger">{{ $image }}</p>
                @enderror
                @if ($project)
                <img width="150" src="{{ asset('storage/' . $project->image) }}"  />
                @endif

            </div>


            <div class="form-floating my-5">
                <label for="Descrizione">Descrizione</label>

                <textarea class="form-control" placeholder="Descrizione" id="Descrizione" name="description" style="height: 200px">{{ old('description',$project?->description)  }}</textarea>

                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>

        </form>
    </div>
</div>



</div>





@endsection
