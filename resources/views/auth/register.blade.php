@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg bg-body-tertiary rounded">
                    <div class="card-header deliv-orange text-white text-center">Effettua la registrazione</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="registerUserForm">
                            @csrf
                            <div class="row mb-4">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome *</label>
                                <div class="col-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome *</label>
                                <div class="col-12">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail *</label>
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password *</label>
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma password *</label>
                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  minlength="8">
                                    <span id="password-error-message" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row my-5">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success button-color px-5">Registrati</button>
                                </div>
                            </div>
                            <div class="row my-5 justify-content-center">
                                <div class="col-12">
                                    <p class="conditions-text text-center">
                                        Effettuando la registrazione, accetti i nostri <span><a href="#">Termini e condizioni d'uso.</a></span> Leggi la nostra informativa sulla <span><a href="#">Privacy</a></span> e <span><a href="#">Cookie</a></span>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
