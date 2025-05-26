<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KueKeu - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pink: #ff6b9d;
            --dark-pink: #e04d80;
            --light-pink: #fff5f7;
            --soft-shadow: 0 4px 20px rgba(255, 107, 157, 0.15);
        }
        
        body {
            background-color: var(--light-pink);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            color: var(--pink) !important;
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
        }
        
        .navbar-brand span {
            color: #333;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--pink) !important;
            background-color: rgba(255, 107, 157, 0.1);
        }
        
        .btn-pink {
            background-color: var(--pink);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--soft-shadow);
        }
        
        .btn-pink:hover {
            background-color: var(--dark-pink);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(255, 107, 157, 0.3);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            background: white;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }
        
        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .text-pink {
            color: var(--pink);
        }
        
        .badge-pink {
            background-color: var(--pink);
            font-weight: 500;
        }
        
        main {
            flex: 1;
            padding: 2rem 0;
        }
        
        .alert {
            border-radius: 10px;
            box-shadow: var(--soft-shadow);
        }
        
        footer {
            background: linear-gradient(135deg, var(--pink), var(--dark-pink));
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        footer p {
            margin: 0;
            font-weight: 500;
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
        
        .cart-badge {
            font-size: 0.6rem;
            padding: 0.25rem 0.4rem;
        }
        
        .hero-section {
            background: linear-gradient(135deg, rgba(255,107,157,0.1) 0%, rgba(255,255,255,1) 100%);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--pink);
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Kue<span>Keu</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cakes.index') }}"><i class="fas fa-birthday-cake me-1"></i> Katalog Kue</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart me-1"></i> Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-clipboard-list me-1"></i> Pesanan Saya</a>
                        </li>
                    @endauth
                    @auth
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.cakes.index') }}"><i class="fas fa-cog me-1"></i> Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-pink ms-2" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i> Daftar</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link position-relative me-2" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                @if(Auth::user()->activeCart && Auth::user()->activeCart->items->count() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
                                        {{ Auth::user()->activeCart->items->count() }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil Saya</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}"><i class="fas fa-clipboard-list me-2"></i> Pesanan Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
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
            
            @yield('content')
        </div>
    </main>

    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">KueKeu</h5>
                    <p class="text-white-50">Toko kue online dengan berbagai pilihan kue lezat untuk setiap kesempatan spesial Anda.</p>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('cakes.index') }}" class="text-white-50 text-decoration-none">Katalog</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Jl. Kue Manis No. 123, Jakarta</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@kuekeu.com</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="text-white mb-3">Media Sosial</h5>
                    <div class="d-flex">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-white-50">
            <div class="text-center">
                <p class="mb-0 text-white-50">&copy; 2023 KueKeu - Toko Kue Online. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    @stack('scripts')
</body>
</html>