@extends('layouts.public')

@section('content')
<link href="{{asset('css/themes/css/main.css')}}" rel="stylesheet"/>
<div class="container">
    <div class="center">

                <h4 class=" left title"><span class="text"><strong>Login</strong></h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form form-separator">
                            <label for="Nome utente" class="form-text col-md-4 col-form-label text-md-right">{{ __('Nome utente') }}</label>

                            <div class="col-md-6">
                                <input type="text" placeholder="Inserisci il tuo nome utente"  class="form-control @error('email') is-invalid @enderror" name="nomeutente" value="{{ old('nomeutente') }}" required autocomplete="nomeutente" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-text col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Inserisci la tua password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-inverse large">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    <div  class="wrap-input">
                        <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
                    </div>
                </div>


</div>


    @endsection

