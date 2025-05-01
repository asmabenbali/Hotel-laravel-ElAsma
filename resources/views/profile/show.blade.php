@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header" style="background-color: #f7c8d4; color: #ff66b2;">
                    <h4 class="mb-0">My Profile</h4>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset(Auth::user()->photo ? 'storage/'.Auth::user()->photo : 'images/default-profile.png') }}"
                                 class="img-fluid rounded-circle mb-4" style="max-width: 150px;" alt="Profile Photo">
                            <a href="{{ route('profile.edit') }}" class="btn btn-pink btn-sm">Edit Profile</a>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-muted">Matricule</th>
                                    <td>{{ Auth::user()->Matricule }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Name</th>
                                    <td>{{ Auth::user()->nom }} {{ Auth::user()->Prenom }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Email</th>
                                    <td>{{ Auth::user()->Email }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Account Type</th>
                                    <td>{{ ucfirst(Auth::user()->TypeCompte) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
