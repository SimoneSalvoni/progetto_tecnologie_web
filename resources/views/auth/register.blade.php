@extends('layouts.public')

@section('content')
<div class="container">

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
                    {{ Form::submit('Conferma registrazione', ['class' => 'button clickable']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
