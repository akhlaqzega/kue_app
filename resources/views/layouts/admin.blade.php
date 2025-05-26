<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <style>
      :root {
        --pink: #e83e8c;
        --dark-pink: #c2185b;
        --light-pink: #fce4ec;
        --admin-bg: #f8f9fa;
      }
      
      body {
        background-color: var(--admin-bg);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }
      
      .bg-pink {
        background-color: var(--pink) !important;
      }
      
      .bg-dark-pink {
        background-color: var(--dark-pink) !important;
      }
      
      .text-pink {
        color: var(--pink) !important;
      }
      
      .btn-pink {
        background-color: var(--pink);
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      
      .btn-pink:hover {
        background-color: var(--dark-pink);
        color: white;
        transform: translateY(-2px);
      }
      
      .navbar {
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        padding: 0.8rem 0;
      }
      
      .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        letter-spacing: -0.5px;
      }
      
      .nav-link {
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
      }
      
      .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
      }
      
      .dropdown-menu {
        border: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 0.5rem;
      }
      
      .dropdown-item {
        border-radius: 6px;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
      }
      
      .dropdown-item:hover {
        background-color: var(--light-pink);
        color: var(--pink);
      }
      
      .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
      }
      
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
      }
      
      .card-header {
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        font-weight: 600;
      }
      
      .table th {
        background-color: var(--light-pink);
        color: var(--dark-pink);
      }
      
      footer {
        padding: 1.5rem 0;
      }
      
      .sidebar {
        background-color: white;
        min-height: calc(100vh - 56px);
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
      }
      
      .sidebar .nav-link {
        color: #333;
        border-radius: 0;
        padding: 0.75rem 1.5rem !important;
        border-left: 3px solid transparent;
      }
      
      .sidebar .nav-link:hover {
        background-color: var(--light-pink);
        color: var(--pink);
      }
      
      .sidebar .nav-link.active {
        background-color: var(--light-pink);
        color: var(--pink);
        border-left: 3px solid var(--pink);
      }
      
      .sidebar .nav-link i {
        width: 20px;
        margin-right: 10px;
        text-align: center;
      }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-pink">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-crown me-2"></i>Admin Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.cakes.index') }}">
                            <i class="fas fa-birthday-cake me-1"></i>Kelola Kue
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">
                            <i class="fas fa-clipboard-list me-1"></i>Kelola Pesanan
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarAdminDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user me-2"></i>Profil
                                </a>
                            </li>
                     
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid flex-grow-1">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.cakes.*') ? 'active' : '' }}" href="{{ route('admin.cakes.index') }}">
                                <i class="fas fa-birthday-cake"></i> Kelola Kue
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                                <i class="fas fa-clipboard-list"></i> Kelola Pesanan
                            </a>
                        </li>

                
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>{{ session('error') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        @yield('actions')
                    </div>
                </div>
                
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="bg-dark-pink text-white text-center py-3 mt-auto">
        <div class="container">
            <div class="d-flex justify-content-center mb-2">
                <a href="#" class="text-white mx-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mx-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-3"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="mb-0">&copy; {{ date('Y') }} KueKu. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>