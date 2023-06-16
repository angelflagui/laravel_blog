<header class="wrapper bg-soft-primary">
    <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
      <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand w-100">
          <a href="{{  route('welcome')  }}">
            Laravel Blog
          </a>
        </div>
        <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
          <div class="offcanvas-header d-lg-none">
            <h3 class="text-white fs-30 mb-0">Laravel Blog</h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('front.posts.index') }}" >Blog</a>
              </li>
              @if (Auth::check() && Auth::user()->role == '1')

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('admin.home') }}" >Admin Panel</a>
              </li>
              @endif


            </ul>
            <!-- /.navbar-nav -->

            <!-- /.offcanvas-footer -->
          </div>
          <!-- /.offcanvas-body -->
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-other w-100 d-flex ms-auto">
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item"><a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-search"><i class="uil uil-search"></i></a></li>
            <li class="nav-item d-none d-md-block">

                @guest
                <a href="{{ route('login.show') }}" class="btn btn-sm btn-primary rounded-pill">Login</a>
                @else
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('assets/img/undraw_profile.svg') }}" style="width:2rem">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('users.posts.index') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Posts
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="post" >
                        @csrf
                        <button type="submit" class="dropdown-item"   >
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </button>
                        </form>
                    </div>
                </li>

                @endguest

            </li>
            <li class="nav-item d-lg-none">
              <button class="hamburger offcanvas-nav-btn"><span></span></button>
            </li>
          </ul>
          <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->
      </div>
      <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">
      <div class="container d-flex flex-row py-6">
        <form class="search-form w-100">
          <input id="search-form" type="text" class="form-control" placeholder="Type keyword and hit enter">
        </form>
        <!-- /.search-form -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.offcanvas -->
  </header>
