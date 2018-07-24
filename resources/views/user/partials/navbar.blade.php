<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route("post") }}">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
      <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
    @else

    <li><a href="#" class="nav-link">{{ Auth::user()->name }} </a></li>
    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Logout</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endguest
    </ul>
  </div>
  
</nav>