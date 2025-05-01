<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-4" width="120">
            <h1 class="mb-4" style="font-family: 'Poppins', sans-serif; font-weight: bold; color: #ff4171;">Welcome To PINK BEN-BALI RESTAURANT</h1>
            <p class="lead mb-5" style="font-size: 1.2rem; color: #4a4a4a;">Meal reservation system for staff members</p>

            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-lg btn-gradient px-4 gap-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4">Register</a>
                @else
                    <a href="{{ Auth::user()->TypeCompte === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                       class="btn btn-lg btn-gradient px-4 gap-3">
                         Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </div>
</div>

<!-- Style ajouté directement à la page -->
<style>
    body {
        background: linear-gradient(135deg, #ffccd9,rgb(253, 252, 252)); /* Dégradé rose clair à rose intense */
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    .btn-gradient {
        background: linear-gradient(45deg, #ff4171, #ff1a62); /* Dégradé rose plus intense */
        border: none;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #ff1a62, #ff4171);
        transform: scale(1.05);
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    h1 {
        font-size: 2.5rem;
        color: #ff4171; /* Rose intense */
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    p.lead {
        font-size: 1.2rem;
        color: #4a4a4a;
    }

    .container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .mb-4 {
        margin-bottom: 2rem;
    }

    .gap-3 {
        gap: 1.5rem;
    }
</style>
