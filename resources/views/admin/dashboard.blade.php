@extends('layouts.app')

@section('title', 'Espace Administrateur')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <main class="col-md-9 ms-sm-auto px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-custom">Tableau de bord Administrateur</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-custom alert-dismissible fade show" role="alert">
                    <strong>Succès!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Réorganisation de Quick Links avec un plus grand espace -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card card-custom shadow-sm border-0 rounded-3">
                        <div class="card-header card-header-custom">
                            <h5>Quick Links</h5>
                        </div>
                        <div class="card-body card-body-custom">
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('admin.reservations') }}" class="btn btn-lg btn-custom">
                                    Voir toutes les réservations
                                </a>
                                <a href="{{ route('admin.statistics') }}" class="btn btn-lg btn-custom">
                                    Voir les statistiques
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques - Disposition en 2 colonnes sur écran large -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card card-custom-bg mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs Totals</h5>
                            <p class="card-text fs-4">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card card-custom-bg mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title">Réservations du jour</h5>
                            <p class="card-text fs-4">{{ $todayReservations }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cartes de Réservations - Organisation en 1 colonne sur petits écrans, 2 sur grands écrans -->
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-custom-bg mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title">Réservations du mois</h5>
                            <p class="card-text fs-4">{{ $monthReservations }}</p>
                        </div>
                    </div>
                </div>

                <!-- Vous pouvez ajouter d'autres cartes de données ici -->
            </div>
        </main>
    </div>
</div>
@endsection
