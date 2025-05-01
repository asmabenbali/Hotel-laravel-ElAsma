@extends('layouts.app')

@section('title', 'Nouvelle Réservation')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header" style="background-color: #ff66b2; color: white;">
            <h4 class="mb-0">Nouvelle Réservation</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="DateReservation" class="form-label">Date de la réservation</label>
                    <input type="date" class="form-control @error('DateReservation') is-invalid @enderror"
                           id="DateReservation" name="DateReservation"
                           value="{{ old('DateReservation') }}" required>
                    @error('DateReservation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <h5>Sélectionner les repas :</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Repas1" name="Repas1"
                               {{ old('Repas1') ? 'checked' : '' }}>
                        <label class="form-check-label" for="Repas1">Petit-déjeuner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Repas2" name="Repas2"
                               {{ old('Repas2') ? 'checked' : '' }}>
                        <label class="form-check-label" for="Repas2">Déjeuner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Repas3" name="Repas3"
                               {{ old('Repas3') ? 'checked' : '' }}>
                        <label class="form-check-label" for="Repas3">Dîner</label>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-pink">Enregistrer la réservation</button>
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
