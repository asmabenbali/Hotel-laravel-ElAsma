@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header" style="background-color: #f06292; color: white;">
                    <h4 class="mb-0">Connexion</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login"
                                name="login" required>
                            @error('login')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="motdepasse" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('motdepasse') is-invalid @enderror"
                                id="motdepasse" name="motdepasse" required>
                            @error('motdepasse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Mémoriser le mot de passe</label>
                        </div>
                        <button type="submit" class="btn w-100" style="background-color: #ec407a; color: white;">Se connecter</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p><a href="{{ route('register') }}" style="color: #ec407a;">Register </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
