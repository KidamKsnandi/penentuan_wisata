<nav class="navbar navbar-top navbar-expand navbar-dark bg-dark border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="navbar-collapse">
                @if (Auth::user()->hasRole('admin'))
                    <h1 class="text-white"><span class="text-success">Admin</span>&nbsp;<a href="/">Wisata</a></h1>
                @elseif(Auth::user()->hasRole('author'))
                    <h1 class="text-white"><span class="text-success">Author</span>&nbsp;<a href="/">Wisata</a></h1>
                @endif
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <i class="ni ni-single-02"></i>
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        @if (Auth::user()->hasRole('admin'))
                            <a href="/admin/{{ Auth::user()->id }}/profile" class="dropdown-item">
                            @elseif(Auth::user()->hasRole('author'))
                                <a href="/author/{{ Auth::user()->id }}/profile" class="dropdown-item">
                        @endif
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
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
