<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Activa</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/activalogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>

  <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="#" aria-label="Activa dashboard">
          <span class="brand-copy"><img src="{{ asset('assets/images/logos/activalogo.png') }}" alt="Activa"></span>
          <span class="brand-copy">
            <span class="brand-title">Activa</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link {{ request()->is('guru/dashboard') ? 'active' : '' }}"
            href="{{ url('/guru/dashboard') }}">
            <span class="nav-icon"><i class="bi bi-speedometer2"></i></span>
            <span class="nav-text">Dashboard</span>
        </a>

        <a class="nav-link {{ request()->is('guru/classes*') ? 'active' : '' }}"
            href="{{ url('/guru/classes') }}">
            <span class="nav-icon"><i class="bi bi-person-plus"></i></span>
            <span class="nav-text">Classes</span>
        </a>

        <a class="nav-link {{ request()->is('guru/students*') ? 'active' : '' }}"
            href="{{ url('/guru/students') }}">
            <span class="nav-icon"><i class="bi bi-person-badge"></i></span>
            <span class="nav-text">Students</span>
        </a>

        <a class="nav-link {{ request()->is('guru/attendance*') ? 'active' : '' }}"
            href="{{ url('/guru/attendance') }}">
            <span class="nav-icon"><i class="bi bi-bar-chart-line"></i></span>
            <span class="nav-text">Absensi</span>
        </a>

        <a class="nav-link {{ request()->is('guru/journal*') ? 'active' : '' }}"
            href="{{ url('/guru/journal') }}">
            <span class="nav-icon"><i class="bi bi-table"></i></span>
            <span class="nav-text">Journal</span>
        </a>
      </nav>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
            <input class="form-control search-input" type="search" placeholder="Search users, orders, reports" aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('/guru/profile') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Logout
                    </button>
                </form>

              </ul>
            </div>
          </div>
        </div>
      </nav>


      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>


      @yield('content')

      
</body>
</html>