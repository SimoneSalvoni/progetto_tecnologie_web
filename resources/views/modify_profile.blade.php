@extends('layouts.public')
@section('title', 'Modifica Profilo')

@section('content')
@isset($user)

<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Modifica Profilo</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'modificaprofilo', 'class' => 'contact-form')) }}
                <div class="wrap-input">
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('nome', $user->nome, ['class' => 'input','id' => 'nome', 'required' => '']) }}
                    @if ($errors->first('nome'))
                    <ul class="errors">
                        @foreach ($errors->get('nome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('cognome', $user->cognome, ['class' => 'input','id' => 'cognome', 'required' =>
                    '']) }}
                    @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::text('email', $user->email, ['class' => 'input','id' => 'email', 'required' => ''])
                    }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('nomeutente', 'Nome utente', ['class' => 'label-input']) }}
                    {{ Form::text('nomeutente', $user->nomeutente, ['class' => 'input','id' => 'nomeutente',
                    'required' => '']) }}
                    @if ($errors->first('nomeutente'))
                    <ul class="errors">
                        @foreach ($errors->get('nomeutente') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('vecchia-password', 'Vecchia Password', ['class' => 'label-input']) }}
                    {{ Form::password('vecchia-password', ['class' => 'input','id' => 'vecchia-password', 'required' => '']) }}
                    @if ($errors->first('vecchia-password'))
                    <ul class="errors">
                        @foreach ($errors->get('vecchia-password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('nuova-password', 'Nuova Password', ['class' => 'label-input']) }}
                    {{ Form::password('password', ['class' => 'input','id' => 'password']) }}
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                    {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
                </div>
                <span class="container-form-btn">
                    {{ Form::submit('Conferma Modifiche', ['class' => 'button clickable']) }}
                </span>
                {{ Form::close() }}
                <span class="container-form-btn">
                    <a href="{{route('areariservata.user')}}"><button class="button">Annulla Modifiche</button></a>
                </span>
            </div>
        </div>
    </div>
</div>

@endisset
@endsection
