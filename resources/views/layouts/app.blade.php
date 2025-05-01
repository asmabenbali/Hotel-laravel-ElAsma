<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlas Restaurant - @yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6f42c1; /* Nouvelle couleur principale */
            --secondary-color: rgb(199, 113, 199);
            --accent-color: rgb(207, 96, 205);
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color:rgb(10, 10, 10); /* Changement du fond de la navbar en gris */
        }

        .navbar .navbar-nav .nav-link {
            color: #ffffff !important; /* Texte des liens en blanc */
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #5a6368; /* Couleur au survol */
            color: #ffffff !important;
        }

        .navbar-brand {
            color: #ffffff !important; /* Changer la couleur du texte du logo */
        }

        .navbar-toggler {
            border-color: #ffffff; /* Changer la couleur du bouton hamburger */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Couleur de l'icône du bouton hamburger */
        }

        .navbar .navbar-nav .nav-link.active {
            background-color: #4b2a9f; /* Couleur du lien actif */
            font-weight: 600;
        }

        /* Autres styles de la page */
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
        }

        .btn {
            border-radius: 5px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(13, 110, 253, 0.2);
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .nav-link {
            font-weight: 500;
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }

        /* Sidebar styling */
        #sidebar {
            min-height: calc(100vh - 56px);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        #sidebar .nav-link {
            font-size: 0.9rem;
            padding: 0.75rem 1.25rem;
            border-radius: 5px;
            margin: 2px 10px;
            transition: all 0.2s;
        }

        #sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        #sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        #sidebar .nav-link i {
            margin-right: 8px;
        }

        /* Alert styling */
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,.05);
        }

        /* User dropdown styling */
        .user-dropdown img {
            width: 32px;
            height: 32px;
            object-fit: cover;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                Atlas Restaurant
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown user-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->Prenom }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ Auth::user()->TypeCompte === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Tableau de bord
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user-circle me-2"></i> Mon profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Inscription
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>
