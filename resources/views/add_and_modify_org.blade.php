@extends('layouts.public')
@section('title', 'Gestione Organizzatori')
{{--- Aggiungere script per il futuro---}}
@section('content')
<div class="container">
    <div class="center">
        <h4 class="left title"><span class="text"><strong>Gestione Organizzatore</strong></span></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                @isset($org)
                {{ Form::open(array('route' => 'ModifyOrg', 'class' => 'contact-form')) }}
                <div class="wrap-input">
                    {{ Form::label('nomeutente', 'Nome Utente', ['class' => 'label-input']) }}
                    {{ Form::text('nomeutente', $org->nomeutente, ['class' => 'input','id' => 'nomeutente', 'required' => '']) }}
                    @if ($errors->first('nomeutente'))
                    <ul class="errors">
                        @foreach ($errors->get('nomeutente') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::email('email', $org->email, ['class' => 'input','id' => 'email', 'required' => '']) }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('organizzazione', 'Organizzazione', ['class' => 'label-input']) }}
                    {{ Form::text('organizzazione', $org->organizzazione, ['class' => 'input','id' => 'organizzazione', 'required' => '']) }}
                    @if ($errors->first('organizzazione'))
                    <ul class="errors">
                        @foreach ($errors->get('organizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::hidden('idOrg', $org->id) }}
                    <div class="wrap-input">
                        {{ Form::label('password', 'Nuova Password', ['class' => 'label-input']) }}
                        {{ Form::password('password', ['class' => 'input','id' => 'password']) }}
                        @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <span class="container-form-btn">
                 <!--   {{ Form::submit('Conferma Modifiche', ['class' => 'button']) }} -->
                    <button class="button clickable" formaction="{{route('ModifyOrg')}}">Conferma Modifiche</button>
                </span>
                {{ Form::close() }}
                <span class="container-form-btn">
                    <a href="{{route('areariservata.admin')}}"><button class="button">Annulla Modifiche</button></a>
                </span>
                @endisset





                {{-- Form per aggiungere un nuovo organizzatore --}}
                @if (!isset($org))
                {{ Form::open(array('route' => 'InsertOrg', 'class' => 'contact-form')) }}
                <div class="wrap-input">
                    {{ Form::label('nomeutente', 'Nome Utente', ['class' => 'label-input']) }}
                    {{ Form::text('nomeutente', '', ['class' => 'input','id' => 'nomeutente', 'required' => '']) }}
                    @if ($errors->first('nomeutente'))
                    <ul class="errors">
                        @foreach ($errors->get('nomeutente') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::email('email', '', ['class' => 'input','id' => 'email', 'required' => '']) }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('organizzazione', 'Organizzazione', ['class' => 'label-input']) }}
                    {{ Form::text('organizzazione','', ['class' => 'input','id' => 'organizzazione', 'required' => '']) }}
                    @if ($errors->first('organizzazione'))
                    <ul class="errors">
                        @foreach ($errors->get('organizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
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
                    {{ Form::label('password_confirm', 'Conferma Password', ['class' => 'label-input']) }}
                    {{ Form::password('password_confirmation', ['class' => 'input','id' => 'password_confirm']) }}
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <span class="container-form-btn">
                    {{ Form::submit('Conferma Inserimento', ['class' => 'button']) }}
                    {{-- <button class="button clickable" formaction="{{route('InsertOrg')}}">Conferma
                    Inserimento</button> --}}
                </span>
                {{ Form::close() }}
                <span class="container-form-btn">
                    <a href="{{route('areariservata.admin')}}"><button class="button">Annulla Inserimento</button></a>
                </span>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
