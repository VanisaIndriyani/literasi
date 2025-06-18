<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Ruang Literasi Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @yield('styles')
    <style>
        :root {
            --primary-color: #8B4513;    /* Dark brown */
            --secondary-color: #DEB887;   /* Burlywood */
            --accent-color: #D2691E;      /* Chocolate */
            --dark-color: #654321;        /* Saddle brown */
            --cream-color: #FFF8DC;       /* Cornsilk */
            --light-brown: #DEB887;       /* Burlywood */
            --gradient-brown: linear-gradient(135deg, #8B4513, #A0522D);
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: var(--primary-color);
            background: var(--gradient-brown);
            width: 14rem; /* Set a fixed width for the sidebar */
        }

        .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 800;
            padding: 1.5rem 1rem;
            text-align: center;
            letter-spacing: 0.05rem;
            color: var(--cream-color);
        }

        /* Topbar */
        .topbar {
            height: 4.375rem;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
            background-color: var(--cream-color);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
        }

        .topbar .navbar-nav .nav-link {
             padding: 0 1rem;
             color: var(--dark-color);
        }

         .topbar .navbar-nav .nav-link:hover {
             color: var(--primary-color);
         }

        /* Content */
        .content {
            margin-left: 14rem; /* Adjust content margin to match sidebar width */
            padding: 1.5rem;
            flex-grow: 1;
        }

        /* Utilities */
        .dropdown-menu {
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
        }

        .dropdown-item:active {
            background-color: var(--primary-color);
        }

        /* Custom styles for sidebar nav links */
        .sidebar .nav-link {
            color: var(--cream-color); /* Matches --cream-color from main.blade.php */
            padding: 0.75rem 1rem;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(222, 184, 135, 0.2); /* Matches rgba(222, 184, 135, 0.2) from main.blade.php */
            color: var(--cream-color);
        }

        .sidebar .nav-link.active {
            background-color: rgba(222, 184, 135, 0.3); /* Matches rgba(222, 184, 135, 0.3) from main.blade.php */
            color: var(--cream-color);
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }

        .sidebar-heading {
            color: var(--cream-color);
            opacity: 0.7;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar position-fixed">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div>Admin Pustakawan</div>
            </a>

            <hr class="sidebar-divider bg-white opacity-25">

            <ul class="nav flex-column p-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider bg-white opacity-25">
                <div class="sidebar-heading">
                    KELOLA HALAMAN
                </div>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.beranda.index') ? 'active' : '' }}" href="{{ route('admin.beranda.index') }}">
                        <i class="fas fa-home"></i> Kelola Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.informasi.index') ? 'active' : '' }}" href="{{ route('admin.informasi.index') }}">
                        <i class="fas fa-info-circle"></i> Kelola Informasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.berita.index') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">
                        <i class="fas fa-newspaper"></i> Kelola Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.books.index') ? 'active' : '' }}" href="{{ route('admin.books.index') }}">
                        <i class="fas fa-book"></i> Kelola Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.bantuan.index') ? 'active' : '' }}" href="{{ route('admin.bantuan.index') }}">
                        <i class="fas fa-question-circle"></i> Kelola Bantuan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.pustakawan.index') ? 'active' : '' }}" href="{{ route('admin.pustakawan.index') }}">
                        <i class="fas fa-user-tie"></i> Kelola Pustakawan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.pengunjung.*') ? 'active' : '' }}" href="{{ route('admin.pengunjung.index') }}">
                        <i class="fas fa-users fa-fw me-2"></i>
                        Pengunjung
                    </a>
                </li>
                <hr class="sidebar-divider bg-white opacity-25">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>