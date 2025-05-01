@extends('layouts.app')

@section('title', 'Admin - Reservations')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <main class="col-md-9 ms-sm-auto px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">All Reservations</h1>
            </div>

            <!-- Style direct dans la page -->
            <style>
                body {
                    background: linear-gradient(135deg, #ffafcc, #ff6f91); /* Dégradé rose clair à rose foncé */
                    color: #333; /* Texte sombre pour la lisibilité */
                }

                .card {
                    background-color: white;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    margin-bottom: 20px;
                }

                table {
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                }

                th, td {
                    padding: 12px;
                    text-align: center;
                }

                th {
                    background-color: #ff6f91;
                    color: white;
                    font-weight: bold;
                }

                td {
                    background-color: #fff;
                }

                tr:nth-child(even) {
                    background-color: #f8f9fa;
                }

                tr:hover {
                    background-color: #ffe6f0; /* Survol rose clair */
                }

                .btn-danger {
                    background-color: #ff3d6e;
                    border-color: #ff3d6e;
                }

                .btn-danger:hover {
                    background-color: #ff1a4d;
                    border-color: #ff1a4d;
                }

                .pagination {
                    justify-content: center;
                    padding: 20px 0;
                }
            </style>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>User</th>
                            <th>Petit-déjeuner</th>
                            <th>Déjeuner</th>
                            <th>Dîner</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->DateReservation->format('d/m/Y') }}</td>
                            <td>{{ $reservation->compte->nom }} {{ $reservation->compte->Prenom }}</td>
                            <td>{{ $reservation->Repas1 ? '✔' : '✖' }}</td>
                            <td>{{ $reservation->Repas2 ? '✔' : '✖' }}</td>
                            <td>{{ $reservation->Repas3 ? '✔' : '✖' }}</td>
                            <td>
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $reservations->links() }}
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
