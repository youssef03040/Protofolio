@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-4">Registreren</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Naam</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Wachtwoord</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Bevestig wachtwoord</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Account aanvragen</button>
                    </form>
                    <p class="mt-3 mb-0">Heb je al een account? <a href="{{ route('login') }}">Log in</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
