@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-4">Inloggen</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Wachtwoord</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Onthoud mij</label>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Inloggen</button>
                    </form>
                    <p class="mt-3 mb-0">Nog geen account? <a href="{{ route('register') }}">Registreer nu</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
