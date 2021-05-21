@extends('layouts.public')

@section('content')
<link href="{{asset('css/themes/css/main.css')}}" rel="stylesheet"/>
<<<<<<< HEAD
=======
{{--
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
<div class="container">
    <div class="center">

                <h4 class=" left title"><span class="text"><strong>Login</strong></h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form form-separator">
                            <label for="Nome utente" class="form-text col-md-4 col-form-label text-md-right">{{ __('Nome utente') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input type="text" placeholder="Inserisci il tuo nome utente"  class="form-control @error('email') is-invalid @enderror" name="nomeutente" value="{{ old('nomeutente') }}" required autocomplete="nomeutente" autofocus>
=======
                                <input type="text" placeholder="Inserisci il tuo nome utente"  class="form-control" name="nomeutente" value="{{ old('nomeutente') }}" required autocomplete="nomeutente" autofocus>
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c

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
<<<<<<< HEAD
                                <input id="password" type="password" placeholder="Inserisci la tua password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
=======
                                <input id="password" type="password" placeholder="Inserisci la tua password" class="form-control"name="password" required autocomplete="current-password">
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c

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
<<<<<<< HEAD

=======
--}}
{{-- Prova della form con laravel collective --}}
<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Login</strong></h4>
    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}

             <div  class="wrap-input">
             </div>
             <div  class="wrap-input">
                {{ Form::label('nomeutente', 'Nome Utente', ['class' => 'label-input']) }}
                {{ Form::text('nomeutente', '', ['class' => 'input','id' => 'nomeutente']) }}
                @if ($errors->first('nomeutente'))
                <ul class="errors">
                    @foreach ($errors->get('nomeutente') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

             <div  class="wrap-input">
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="container-form-btn">
                {{ Form::submit('Login', ['class' => 'form-btn1']) }}
            </div>

            {{ Form::close() }}
        </div>
        <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
    </div>
    </div>
</div>
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c

    @endsection

