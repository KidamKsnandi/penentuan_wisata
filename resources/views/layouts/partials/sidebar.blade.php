<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                @if(Auth::user()->hasRole('admin'))
              <a class="nav-link {{ Request::is('admin/')? "active":"" }}" href="/admin/">
                @elseif(Auth::user()->hasRole('author'))
                <a class="nav-link {{ Request::is('author/')? "active":"" }}" href="/author/">
                @endif
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @if ( Auth::user()->hasRole('admin') )
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/kategori')? "active":"" }}" href="/admin/kategori">
                <i class="ni ni-tag text-orange"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            @endif
            @if ( Auth::user()->hasRole('admin') )
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/wisata')? "active":"" }}" href="/admin/wisata">
                <i class="ni ni-istanbul text-primary"></i>
                <span class="nav-link-text">Objek Wisata</span>
              </a>
            </li>
            @endif
            @if ( Auth::user()->hasRole('admin') )
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/galeri')? "active":"" }}" href="/admin/galeri">
                <i class="ni ni-album-2 text-yellow"></i>
                <span class="nav-link-text">Galeri</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
                @if ( Auth::user()->hasRole('author') )
              <a class="nav-link {{ Request::is('author/artikel')? "active":"" }}" href="/author/artikel">
                @elseif ( Auth::user()->hasRole('admin') )
              <a class="nav-link {{ Request::is('admin/article')? "active":"" }}" href="/admin/article">
                @endif
                <i class="ni ni-single-copy-04 text-default"></i>
                <span class="nav-link-text">Artikel</span>
              </a>
            </li>
            @if ( Auth::user()->hasRole('admin'))
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/user')? "active":"" }}" href="/admin/user">
                <i class="ni ni-circle-08 text-default"></i>
                <span class="nav-link-text">User Management</span>
              </a>
            </li>
            @endif
          </ul>
          </ul>
        </div>
      </div>
    </div>
  </nav>
