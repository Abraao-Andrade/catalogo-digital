<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Catálogo Digital</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarComponent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" id="navDropCategoria">Categorias</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                        Categoria 1
                    </a>
                    <a class="dropdown-item" href="#">
                      Categoria 2
                    </a>
                    <a class="dropdown-item" href="#">
                      Categoria 3
                    </a>
                </div>
              </li>
          </ul>
          
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                  <a class = "nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
              </li>
          </ul>
      </div>
    </div>
  </nav>
