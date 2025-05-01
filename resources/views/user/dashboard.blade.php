@extends('layouts.app')

@section('title', 'Espace Personnel')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header" style="background-color: #ff66b2; color: white;">
                    <h4 class="mb-0">Mon Espace Personnel</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action" style="color: #ff66b2;">Mon Profil</a>
                                <a href="{{ route('reservations.index') }}" class="list-group-item list-group-item-action active" style="background-color: #ff66b2; color: white;">Réservations</a>
                                <a href="{{ route('reservations.create') }}" class="list-group-item list-group-item-action" style="color: #ff66b2;">Nouvelle Réservation</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5 class="mb-4" style="color: #ff66b2;">Bienvenue, {{ Auth::user()->Prenom }}!</h5>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="mb-4">
                                <a href="{{ route('reservations.create') }}" class="btn" style="background-color: #ff66b2; color: white;">
                                    + Nouvelle Réservation
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="table" style="background-color:rgb(214, 108, 161); color: white;">
                                        <tr>
                                            <th>Date</th>
                                            <th>Petit-déjeuner</th>
                                            <th>Déjeuner</th>
                                            <th>Dîner</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->DateReservation->format('d/m/Y') }}</td>
                                            <td>{{ $reservation->Repas1 ? '✔' : '✖' }}</td>
                                            <td>{{ $reservation->Repas2 ? '✔' : '✖' }}</td>
                                            <td>{{ $reservation->Repas3 ? '✔' : '✖' }}</td>
                                            <td>
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Annuler
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Aucune réservation trouvée</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
