<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-xl">
      <a class="navbar-brand" href="#">PORTAL ARTIKEL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts">Artikel</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome Back, {{auth()->user()->name}}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>  Logout</button>
                </form>
              </li>
            </ul>
          </li>

          @else    
          <li class="nav-item">
            <a href="/login" class="btn btn-success me-2 ">Login</a>
          </li>
          @endauth
        </ul>   
        
      </div>
    </div>
  </nav>