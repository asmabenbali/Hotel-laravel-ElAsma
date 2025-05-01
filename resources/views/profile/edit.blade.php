@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header" style="background-color: #f7c8d4; color: #ff66b2;">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset(Auth::user()->photo ? 'storage/'.Auth::user()->photo : 'images/default-profile.png') }}"
                                     class="img-fluid rounded-circle mb-4" style="max-width: 150px;" alt="Profile Photo">
                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                       id="photo" name="photo">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="nom" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                           id="nom" name="nom" value="{{ old('nom', Auth::user()->nom) }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="Prenom" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('Prenom') is-invalid @enderror"
                                           id="Prenom" name="Prenom" value="{{ old('Prenom', Auth::user()->Prenom) }}" required>
                                    @error('Prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('Email') is-invalid @enderror"
                                           id="Email" name="Email" value="{{ old('Email', Auth::user()->Email) }}" required>
                                    @error('Email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #ff66b2; color: white;">Change Password</div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                           id="current_password" name="current_password">
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                           id="new_password" name="new_password">
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control"
                                           id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-pink">Update Profile</button>
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
