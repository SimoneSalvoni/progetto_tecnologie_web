@extends (layouts.public)
@section('title', 'Nuovo evento')

@section('content')
<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Registrazione</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'addNewEvent', 'class' => 'contact-form')) }}   
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
                    <!-- NON SONO CONVINTO: PENSO CHE LA CASELLA DIN INPUT NON CRESCE E FA ABBASTANZA PENA -->
                    {{ Form::label('descrizione', 'Descrizio dell\'evento', ['class' => 'label-input']) }}
                    {{ Form::text('descrizione', '', ['class' => 'input','id' => 'descrizone', 'required' => '']) }}
                    @if ($errors->first('descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('descrizione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('data', 'Data', ['class' => 'label-input']) }}
                    {{ Form::date('data', '', ['class' => 'input','id' => 'data', 'required' => '']) }}
                    @if ($errors->first('data'))
                    <ul class="errors">
                        @foreach ($errors->get('data') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <!-- REGIONE E PROVINCIA DOVREBBERO ESSERE MENU A TENDINA -->
                <div  class="wrap-input">
                    {{ Form::label('regione', 'Regione', ['class' => 'label-input']) }}
                    {{ Form::text('regione', '', ['class' => 'input','id' => 'regione', 'required' => '']) }}
                    @if ($errors->first('regione'))
                    <ul class="errors">
                        @foreach ($errors->get('regione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('provincia', 'Provincia', ['class' => 'label-input']) }}
                    {{ Form::text('provincia', '', ['class' => 'input','id' => 'provincia', 'required' => '']) }}
                    @if ($errors->first('provincia'))
                    <ul class="errors">
                        @foreach ($errors->get('provincia') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('città', 'Città', ['class' => 'label-input']) }} 
                    {{ Form::text('città', '', ['class' => 'input','id' => 'città', 'required' => '']) }}
                    @if ($errors->first('città'))
                    <ul class="errors">
                        @foreach ($errors->get('città') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                    {{ Form::text('indirizzo', '', ['class' => 'input','id' => 'route', 'required' => '']) }}
                    @if ($errors->first('indirizzo'))
                    <ul class="errors">
                        @foreach ($errors->get('indirizzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('numciv', 'Numero civico', ['class' => 'label-input']) }} 
                    {{ Form::text('numciv', '', ['class' => 'input','id' => 'street_number', 'required' => '']) }}
                    @if ($errors->first('numciv'))
                    <ul class="errors">
                        @foreach ($errors->get('numciv') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('comeraggiungerci', 'Indicazioni su come raggiungere il luogo', ['class' => 'label-input']) }} 
                    {{ Form::image('comeraggiungerci', '', ['class' => 'input','id' => 'indicazioni']) }}
                    @if ($errors->first('comeraggiungerci'))
                    <ul class="errors">
                        @foreach ($errors->get('comeraggiungerci') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('immagine', 'Seleziona la locandina', ['class' => 'label-input']) }} 
                    {{ Form::image('immagine', '', ['class' => 'input','id' => 'locandina', 'required' => '']) }}
                    @if ($errors->first('immagine'))
                    <ul class="errors">
                        @foreach ($errors->get('immagine') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('bigliettitotali', 'Numero di biglietti', ['class' => 'label-input']) }} 
                    {{ Form::number('bigleittitotali', '', ['class' => 'input','id' => 'bigliettitotali', 'required' => '', 'min' => '0']) }}
                    @if ($errors->first('bigliettitotali'))
                    <ul class="errors">
                        @foreach ($errors->get('bigliettitotali') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('costo', 'Costo', ['class' => 'label-input']) }} 
                    {{ Form::number('costo', '', ['class' => 'input','id' => 'costo', 'required' => '', 'min' => '0']) }}
                    @if ($errors->first('costo'))
                    <ul class="errors">
                        @foreach ($errors->get('costo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('sconto', 'Sconto (%)', ['class' => 'label-input']) }} 
                    {{ Form::number('sconto', '', ['class' => 'input','id' => 'sconto', 'required' => '', 'min' => '0', 'max' => '100']) }}
                    @if ($errors->first('sconto'))
                    <ul class="errors">
                        @foreach ($errors->get('sconto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div  class="wrap-input">
                    {{ Form::label('giornisconto', 'Giorni di sconto', ['class' => 'label-input']) }} 
                    {{ Form::number('giornisconto', '', ['class' => 'input','id' => 'giornisconto', 'required' => '', 'min' => '0']) }}
                    @if ($errors->first('giornisconto'))
                    <ul class="errors">
                        @foreach ($errors->get('giornisconto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="container-form-btn">
                    {{ Form::submit('Crea', ['class' => 'bigbutton clickable']) }}
                </div>
                <div class="container-form-btn">
                    {{ Form::submit('Crea', ['class' => 'bigbutton clickable', 'formaction' => 'org', 'method' => 'get']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection