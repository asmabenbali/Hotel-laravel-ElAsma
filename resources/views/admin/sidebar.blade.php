<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:rgb(223, 122, 173);">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <!-- Section Tableau de bord -->
            <li class="nav-item mb-4">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}" style="color: white;">
                   <i class="fas fa-tachometer-alt me-2" style="color: white;"></i> Tableau de bord
                </a>
            </li>

            <!-- Section Gestion des utilisateurs -->
            <li class="nav-item mb-4">
                <a class="nav-link text-white {{ request()->routeIs('admin.users*') ? 'active' : '' }}"
                   href="{{ route('admin.users.index') }}" style="color: white;">
                   <i class="fas fa-users me-2" style="color: white;"></i> Gestion des utilisateurs
                </a>
            </li>

            <!-- Section Gestion des réservations -->
            <li class="nav-item mb-4">
                <a class="nav-link text-white {{ request()->routeIs('admin.reservations*') ? 'active' : '' }}"
                   href="{{ route('admin.reservations') }}" style="color: white;">
                   <i class="fas fa-calendar-check me-2" style="color: white;"></i> Gestion des réservations
                </a>
            </li>

            <!-- Section Statistiques -->
            <li class="nav-item mb-4">
                <a class="nav-link text-white {{ request()->routeIs('admin.statistics') ? 'active' : '' }}"
                   href="{{ route('admin.statistics') }}" style="color: white;">
                   <i class="fas fa-chart-bar me-2" style="color: white;"></i> Statistiques
                </a>
            </li>

            <!-- Section Profil utilisateur -->
            <li class="nav-item mt-auto">
                <a class="nav-link text-white" href="{{ route('profile.show') }}" style="color: white;">
                   <i class="fas fa-user-circle me-2" style="color: white;"></i> Mon profil
                </a>
            </li>
        </ul>
    </div>
</nav>
