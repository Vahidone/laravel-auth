

<header class="bg-dark">


    <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <a href="{{ route('home')}}" target="_blanck" class="navbar-brand">Vai al sito</a>
          <form action="{{ route('logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            <button class="btn btn-light" type="submit">Logout</button>
          </form>
        </div>
    </nav>

</header>
