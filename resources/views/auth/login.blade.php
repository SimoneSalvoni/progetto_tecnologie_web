@extends('layouts.public')

@section('content')
<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Login</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                <div class="wrap-input">
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

                <div class="wrap-input">
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
                    {{ Form::submit('Login', ['class' => 'button clickable']) }}
                </div>

                {{ Form::close() }}
            </div>
            <p> Se non hai già un account <a id="registrati" href="{{ route('register') }}">registrati</a></p>
        </div>
    </div>
</div>

@endsection
