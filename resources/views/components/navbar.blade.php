<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Vascomm Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if ($isAdmin)
        <li class="nav-item">
          <span class="nav-link" aria-current="page" href="#">Administrator</span>
        </li>
        @endif
      </ul>
      <div class="d-flex">
        @if (!$isLogin)
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
        @endif
        @if ($isLogin)
        <span class="nav-link" href="#">Welcome {{ Auth::user()->name }}</span>
        <a class="btn btn-outline-primary" href="{{ route('signout') }}">Logout</a>
        @endif
      </div>
    </div>
  </div>
</nav>