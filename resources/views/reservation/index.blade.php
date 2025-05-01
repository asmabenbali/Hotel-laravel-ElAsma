@extends('layouts.app')

@section('title', 'Mes Réservations')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header" style="background-color: #f7c8d4; color: #ff66b2;">
            <h4 class="mb-0">Mes Réservations</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
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
                            <td>{{ date('d/m/Y', strtotime($reservation->DateReservation)) }}</td>
                            <td>{{ $reservation->Repas1 ? '✔' : '✖' }}</td>
                            <td>{{ $reservation->Repas2 ? '✔' : '✖' }}</td>
                            <td>{{ $reservation->Repas3 ? '✔' : '✖' }}</td>
                            <td>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
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
@endsection
