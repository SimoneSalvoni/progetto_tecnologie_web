@extends('layouts.public')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
=======
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Registrazione</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}   
                <div  class="wrap-input">
                </div>
                <div  class="wrap-input">
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('nome', '', ['class' => 'input','id' => 'nome', 'required' => '']) }}
                    @if ($errors->first('nome'))
                    <ul class="errors">
                        @foreach ($errors->get('nome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('cognome', '', ['class' => 'input','id' => 'cognome', 'required' => '']) }}
                    @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::text('email', '', ['class' => 'input','id' => 'email', 'required' => '']) }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('nomeutente', 'Nome utente', ['class' => 'label-input']) }}
                    {{ Form::text('nomeutente', '', ['class' => 'input','id' => 'nomeutente', 'required' => '']) }}
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
                    {{ Form::password('password', ['class' => 'input','id' => 'password', 'required' => '']) }}
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                    {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm', 'required' => '']) }}
                </div>
                <div class="container-form-btn">
                    {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
>>>>>>> 7e1b4544963126cb9497e26bca9978faa127ac3d
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
