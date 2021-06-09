@extends('layouts.public')

@section('title', 'Nuovo Evento')
@section('scripts')
<script src="{{ asset('js/event.js') }}"></script>
@if (isset($event))
<script>
    $(function () {
var validationUrl = "{{ route('storeModifiedEvent',[$event->id] ) }}";
var formId = 'modifyEvent';

$(":input").on('blur', function () {
var formElementId = $(this).attr('id');
doElemValidation(formElementId, validationUrl, formId);
});
$("#modifyEvent").on('submit', function (event) {
event.preventDefault();
doFormValidation(validationUrl, formId);
});
});
</script>
<script>
    $(function () {
    @foreach($regions as $region)
            if ("{!!$region!!}" === "{!!$event->regione!!}") {
    $('#regione').append("<option selected value={!!$region!!}>{!!$region!!}</option>");
    } else {
    $('#regione').append(new Option("{!!$region!!}", "{!!$region!!}"));
    }
    @endforeach

    var regione = $('#regione option:selected').text();
    var provUrl = "{{route('province', '')}}" + "/" + regione;
    $('#provincia').find('option').remove();
    $('#provincia').append('<option selected value="{!!$event->provincia!!}">{!!$event->provincia!!}</option>');
    getProvince(provUrl);

    $('#regione').change(function () {
        var regione = $('#regione option:selected').text();
        var provUrl = "{{route('province', '')}}" + "/" + regione;
        $('#provincia').find('option').remove();
        $('#provincia').append('<option selected disabled>Scegli la provincia</option>');
        getProvince(provUrl);
    });
    });
</script>
@else
<script>
    $(function () {
    var validationUrl = "{{ route('addNewEvent') }}";
    var formId = 'addEvent';

    $(":input").on('blur', function () {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, validationUrl, formId);
    });
    $("#addEvent").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(validationUrl, formId);
    });
    });
</script>
<script>
    $(function () {
        $('#regione').append('<option selected disabled>Scegli la regione</option>');
        @foreach($regions as $region)
        $('#regione').append(new Option("{!!$region!!}", "{!!$region!!}"));
        @endforeach
        $('#regione').change(function () {
        var regione = $('#regione option:selected').text();
        var provUrl = "{{route('province', '')}}" + "/" + regione;
        $('#provincia').find('option').remove();
        $('#provincia').append('<option selected disabled>Scegli la provincia</option>');
        getProvince(provUrl);
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
                {{ Form::open(array('route' => ['storeModifiedEvent',$event->id], 'class' => 'contact-form',
                'files'=>true, 'id'=>'modifyEvent', 'method'=>'post')) }}
                {{ Form::hidden('eventId', $event->id, ['id'=> 'eventId']) }}
                @else
                {{ Form::open(array('route' => 'addNewEvent', 'class' => 'contact-form', 'files'=>true, 'id'=>'addEvent', 'method'=>'post')) }}
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
                <div class="wrap-input">
                    {{ Form::label('orario', 'Orario', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::time('orario', $event->orario, ['class' => 'input','id' => 'orario', 'required' => '']) }}
                    @else
                    {{ Form::time('orario', '', ['class' => 'input','id' => 'orario', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('regione', 'Regione', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::select('regione', [''=>''], $event->regione, ['class' => 'input','id' => 'regione', 'required' => '']) }}
                    @else
                    {{ Form::select('regione', [''=>''] , ['class' => 'input','id' => 'regione', 'required' => '']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('provincia', 'Provincia', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::select('provincia',[''=>''] , $event->provincia, ['class' => 'input','id' => 'provincia', 'required' => '']) }}
                    @else
                    {{ Form::select('provincia', [''=>''], ['class' => 'input','id' => 'provincia', 'required' => '']) }}
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
                    {{ Form::number('numciv', '', ['class' => 'input','id' => 'numciv', 'required' => '', 'min'=>'0']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('comeraggiungerci', 'Indicazioni su come raggiungere il luogo', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::textarea('comeraggiungerci',$event->comeraggiungerci, ['class' => 'input','id' => 'comeraggiungerci', 'rows'=>'5','style'=>'width:50em']) }}
                    @else
                    {{ Form::textarea('comeraggiungerci','', ['class' => 'input','id' => 'comeraggiungerci', 'rows'=>'5','style'=>'width:50em']) }}
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('programma', 'Programma dell\'evento', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::textarea('programma',$event->programma, ['class' => 'input','id' => 'programma', 'rows'=>'5','style'=>'width:50em']) }}
                    @else
                    {{ Form::textarea('programma','', ['class' => 'input','id' => 'programma', 'rows'=>'5','style'=>'width:50em']) }}
                    @endif

                </div>

                <div class="wrap-input">
                    {{ Form::label('immagine', 'Seleziona la locandina', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::file('imm', ['class' => 'input','id' => 'immagine']) }}
                    @else                    
                    {{ Form::file('immagine', ['class' => 'input','id' => 'immagine', 'required' => '']) }}
                    @endif
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
                    {{ Form::text('costo',  $event->costo, ['class' => 'input','id' => 'costo', 'required' => '', 'min' => '0']) }}
                    @else
                    {{ Form::text('costo','', ['class' => 'input','id' => 'costo', 'required' => '', 'min' => '0']) }}
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('sconto', 'Sconto (%)', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::number('sconto', $event->sconto, ['class' => 'input','id' => 'sconto', 'min' => '0', 'max' => '100']) }}
                    @else
                    {{ Form::number('sconto', '', ['class' => 'input','id' => 'sconto', 'min' => '0', 'max' => '100']) }}
                    @endif
                </div>
                <div class="wrap-input">
                    {{ Form::label('giornisconto', 'Giorni di sconto', ['class' => 'label-input']) }}
                    @if(isset($event))
                    {{ Form::number('giornisconto', $event->giornisconto, ['class' => 'input','id' => 'giornisconto', 'min' => '0']) }}
                    @else
                    {{ Form::number('giornisconto', '', ['class' => 'input','id' => 'giornisconto', 'min' => '0']) }}
                    @endif
                </div>
                <span class="container-form-btn">
                    @if(isset($event))
                    {{ Form::submit('Conferma Modifica', ['class' => 'button clickable', 'id'=>'submit']) }}
                    @else
                    {{ Form::submit('Conferma Inserimento', ['class' => 'button clickable', 'id'=>'submit']) }}
                    @endif
                </span>
                {{ Form::close() }}
            </div>
        </div>
        <span class="container-form-btn">
            <button type='button' name="annulla" id="annulla" class="button clickable" method="post"
                formaction="{{route('areariservata.org')}}">Annulla Inserimento</button>
        </span>
    </div>
</div>
@endsection
