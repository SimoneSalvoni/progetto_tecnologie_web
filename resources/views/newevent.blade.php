@extends('layouts.public')

@section('title', 'Nuovo Evento')
@section('scripts')
<script src="{{ asset('js/event.js') }}"></script>
@if (isset($event))
<script>
    $(function () {
    var actionUrl = "{{ route('storeModifiedEvent',[$event->id] ) }}";
    var formId = 'modifyEvent';
    //Quando un campo di input per il focus fa quello sotto
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    //Questa parte è l'handler del bottone di submit
    $("#modifyEvent").on('submit', function (event) {
        //Per prima cosa si annulla l'operazione di submit di default con il comando event.preventDefault()
        event.preventDefault();
        //doFormValidatio gestisce l'operazione di validazione della form e effettua in caso il submit
        doFormValidation(actionUrl, formId);
    });
});
</script>

@else
<script>
    $(function () {
    var actionUrl = "{{ route('addNewEvent') }}";
    var formId = 'addEvent';
    //Quando un campo di input per il focus fa quello sotto
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    //Questa parte è l'handler del bottone di submit
    $("#addEvent").on('submit', function (event) {
        //Per prima cosa si annulla l'operazione di submit di default con il comando event.preventDefault()
        event.preventDefault();
        //doFormValidatio gestisce l'operazione di validazione della form e effettua in caso il submit
        doFormValidation(actionUrl, formId);
    });
});
</script>
@endif
@endsection
@section('content')
<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Inserimento Evento</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                @if(isset($event))
                {!! Form::open(array('route' => ['storeModifiedEvent',$event->id], 'class' => 'contact-form',
                'files'=>true, 'id'=>'modifyEvent')) !!}
                {!! Form::hidden('evento', $event->id, ['id'=> 'evento']) !!}
                @else
                {{ Form::open(array('route' => 'addNewEvent', 'class' => 'contact-form', 'files'=>true, 'id'=>'addEvent')) }}
                @endif
                <div class="wrap-input">
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('nome', $event->nome, ['class' => 'input','id' => 'nome', 'required' => '']) }}
                    @else
                    {{ Form::text('nome', '', ['class' => 'input','id' => 'nome', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('descrizione', 'Descrizione dell\'evento', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::textarea('descrizione', $event->descrizione, ['class' => 'input','id' => 'descrizione', 'required' => '', 'rows'=>'5',
                                'style'=>'width:50em']) }}
                    @else
                    {{ Form::textarea('descrizione', '', ['class' => 'input','id' => 'descrizione', 'required' => '', 'rows'=>'5',
                                'style'=>'width:50em']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('data', 'Data', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::date('data', $event->data, ['class' => 'input','id' => 'data', 'required' => '']) }}
                    @else
                    {{ Form::date('data', '', ['class' => 'input','id' => 'data', 'required' => '']) }}
                    @endif
                </div>
                <!-- REGIONE E PROVINCIA DOVREBBERO ESSERE MENU A TENDINA -->
                <div class="wrap-input">
                    {{ Form::label('regione', 'Regione', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('regione', $event->regione, ['class' => 'input','id' => 'regione', 'required' => '']) }}
                    @else
                    {{ Form::text('regione', '', ['class' => 'input','id' => 'regione', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('provincia', 'Provincia', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('provincia', $event->provincia, ['class' => 'input','id' => 'provincia', 'required' => '']) }}
                    @else
                    {{ Form::text('provincia', '', ['class' => 'input','id' => 'provincia', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('città', 'Città', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('città', $event->città, ['class' => 'input','id' => 'città', 'required' => '']) }}
                    @else
                    {{ Form::text('città', '', ['class' => 'input','id' => 'città', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('indirizzo', $event->indirizzo, ['class' => 'input','id' => 'indirizzo', 'required' => '']) }}
                    @else
                    {{ Form::text('indirizzo', '', ['class' => 'input','id' => 'indirizzo', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('numciv', 'Numero civico', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::text('numciv', $event->numciv, ['class' => 'input','id' => 'numciv', 'required' => '']) }}
                    @else
                    {{ Form::text('numciv', '', ['class' => 'input','id' => 'numciv', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('comeraggiungerci', 'Indicazioni su come raggiungere il luogo', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::textarea('comeraggiungerci',$event->comeraggiungerci, ['class' => 'input','id' => 'comeraggiungerci', 'required'=>'', 'rows'=>'5','style'=>'width:50em']) }}
                    @else
                    {{ Form::textarea('comeraggiungerci','', ['class' => 'input','id' => 'comeraggiungerci','required'=>'', 'rows'=>'5','style'=>'width:50em']) }}
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('immagine', 'Seleziona la locandina', ['class' => 'label-input']) }}
                    {{ Form::file('immagine', ['class' => 'input','id' => 'immagine', 'required' => '']) }}
                </div>

                <div class="wrap-input">
                    @if(isset($event))
                    {{ Form::label('bigliettitotali', 'Numero biglietti totali', ['class' => 'label-input']) }}
                    {{ Form::number('bigliettitotali',$event->bigliettitotali, ['class' => 'input','id' => 'bigliettitotali', 'required' => '', 'min' => '0']) }}
                    @else
                    {{ Form::label('bigliettitotali', 'Numero di biglietti', ['class' => 'label-input']) }}
                    {{ Form::number('bigliettitotali', '', ['class' => 'input','id' => 'bigliettitotali', 'required' => '', 'min' => '0']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('costo', 'Costo', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::number('costo',  $event->costo, ['class' => 'input','id' => 'costo', 'required' => '', 'min' => '0']) }}
                    @else
                    {{ Form::number('costo','', ['class' => 'input','id' => 'costo', 'required' => '', 'min' => '0']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('sconto', 'Sconto (%)', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::number('sconto', $event->sconto, ['class' => 'input','id' => 'sconto', 'required' => '', 'min' => '0', 'max' => '100']) }}
                    @else
                    {{ Form::number('sconto', '', ['class' => 'input','id' => 'sconto', 'required' => '', 'min' => '0', 'max' => '100']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('giornisconto', 'Giorni di sconto', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::number('giornisconto', $event->giornisconto, ['class' => 'input','id' => 'giornisconto', 'required' => '', 'min' => '0']) }}
                    @else
                    {{ Form::number('giornisconto', '', ['class' => 'input','id' => 'giornisconto', 'required' => '', 'min' => '0']) }}
                    @endif
                </div>
                <span class="container-form-btn">
                    @if(isset($event))
                    {{ Form::submit('Conferma Modifica', ['class' => 'button clickable']) }}
                    @else
                    {!! Form::submit('Conferma Inserimento', ['class' => 'button clickable']) !!}
                    @endif
                </span>
                <span class="container-form-btn">
                    <button type="submit" name="annulla" id="annulla" class="button clickable" method="post"
                        formaction="{{route('areariservata.org')}}">Annulla Inserimento</button>
                </span>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@endsection
