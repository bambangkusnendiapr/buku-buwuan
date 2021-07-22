<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    @if($profil->profil_logo)
      <img src="{{ asset('images/profil/'.$profil->profil_logo ) }}" alt="LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
    @else
      <img src="{{ asset('images/logo.png') }}" alt="LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
    @endif
    <span class="brand-text font-weight-light">{{ $profil->profil_nama ? $profil->profil_nama : 'Buwuan' }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(Auth::user()->image)
          <img src="{{ asset('images/')}}/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{ asset('images/muslim.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('buwuan') }}" class="nav-link @yield('buwuan')">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buwuan
            </p>
          </a>
        </li>

        <li class="nav-item @yield('master')">
          <a href="#" class="nav-link @yield('data')">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('kategori.index') }}" class="nav-link @yield('kategori')">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            @permission('blok-read')
            <li class="nav-item">
              <a href="{{ route('blok.index') }}" class="nav-link @yield('blok')">
                <i class="far fa-circle nav-icon"></i>
                <p>Blok</p>
              </a>
            </li>
            @endpermission
          </ul>
        </li>

        @role('superadmin|user')
        <li class="nav-item @yield('manajemen')">
          <a href="#" class="nav-link @yield('pengaturan')">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @role('superadmin|user')
            <li class="nav-item">
              <a href="{{ route('profil.index') }}" class="nav-link @yield('profil')">
                <i class="far fa-circle nav-icon"></i>
                <p>Aplikasi</p>
              </a>
            </li>
            @endrole
            @role('superadmin')
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link @yield('user')">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengguna</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('role.index') }}" class="nav-link @yield('role')">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('menu.index') }}" class="nav-link @yield('menu')">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('permission.index') }}" class="nav-link @yield('permission')">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
              </a>
            </li>
            @endrole
          </ul>
        </li>
        @endrole
        <br>
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>