
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-md">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{ config('app.name', 'Laravel') }}</a>
      <ul class="navbar-nav ml-auto">
    <li class="nav-item">    <a class="nav-link" href="/admin/proposals">All Proposal</a>
    </li>
    <li class="nav-item">    <a class="nav-link" href="#">Accepted Proposals</a>
    </li>
      </ul>
      
       <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item"href="/dashboard">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/admin">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
           
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Proposals</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="/admin/proposals">
                  <span data-feather="file-text"></span>
                  All Proposals
                </a>
              </li>
             <!--  <li class="nav-item">
                <a class="nav-link" href="/admin/proposals/failed">
                  <span data-feather="file-text"></span>
                  Failed Proposals
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/proposals/pre">
                  <span data-feather="file-text"></span>
                  Pre-determined Proposals
                </a>
              </li> -->
              
            </ul>
          </div>
        </nav>


