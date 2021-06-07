@extends('layouts.public')
@section('title', 'Area riservata')
@section('scripts')
<script src='{{asset('js/admin.js')}}'></script>

@if(isset($user)&&($user->livello==3))
<script>
    $(document).ready(function () {
            @foreach($orgs as $org)
            if ("{!!$org->organizzazione!!}" === "{!!$user->organizzazione!!}") {
                $('#orgname').append("<option selected value={!!$org->organizzazione!!}>{!!$org->organizzazione!!}</option>");
            } else {
                $('#orgname').append(new Option("{!!$org->organizzazione!!}", "{!!$org->organizzazione!!}"));
            }
            @endforeach
            showAndHide();
            }
            );
</script>
@else
<script>
    $(document).ready(function () {
            @foreach($orgs as $org)
            $('#orgname').append(new Option("{!!$org->organizzazione!!}", "{!!$org->organizzazione!!}"));
            @endforeach
            showAndHide();
            });
</script>
@endif
@endsection

@section('content')
<section name="main content">
    <h3>
        Gestione utenti
    </h3>
    <br />
    <section>
        <div class="outer_search">
            <div>
                {{ Form::open(array('route' => 'searchuser', 'class' => 'contact-form')) }}
                <label for="usertype" class='label-input' style="margin-bottom:-1.55em"> Selezione la tipologia di
                    utente</label>
                <select id="usertype" name="usertype">
                    <option id='c' value="client">Cliente</option>
                    @if(isset($user)&&($user->livello==3))
                    <option id='o' value="org" selected>Organizzazione</option>
                    @else
                    <option id='o' value="org">Organizzazione</option>
                    @endif
                </select>
                <span class="search">
                    <label id='userlabel' for="username" class='label-input'>
                        Inserisci il nome utente
                    </label>
                    @if(isset($user)&&($user->livello==2))
                    <input type="text" name="username" id="username" value="{{$user->nomeutente}}" />
                    @else
                    <input type="text" name="username" id="username">
                    @endif
                    <label id='orglabel' for="orgname" class='label-input'>
                        Seleziona il nome dell'organizzazione
                    </label>
                    <select name="orgname" id="orgname">
                    </select>
                </span>
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                </span>
                @endif
                {!! Form::submit('Cerca utente', ['class' => 'btn btn-inverse', 'style' => 'vertical-align: super']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    @if(isset($user))
    @if($user->livello==2)
    <div class="single_product" style="height:120px">
        <div class="user_info">
            <p><b>Nome utente: {{$user->nomeutente}}</b></p>
            <p><b>Email: {{$user->email}}</b></p>
            <p><b>Nome: {{$user->nome}}</b> </p>
            <p><b>Cognome: {{$user->cognome}}</b></p>
        </div>
        @else
        <div class="single_product" style="height:150px">
            <div class="user_info">
                <p><b>Nome utente: {{$user->nomeutente}}</b></p>
                <p><b>Nome organizzazione: {{$user->organizzazione}}</b></p>
                <p><b>Email: {{$user->email}}</b></p>
                <p><b>Numero di biglietti venduti: {{$biglietti}} </b></p>
                <p><b>Incasso totale: {{$incasso}} €</b></p>
            </div>
            @endif
            <div style="height:inherit">
                @if($user->livello==3)
                <div class="pencil_item user" title="Modifica dati utente">
                    <img id="pencil" class="action_item_clickable" src="{{asset('css/themes/images/pencil.png')}}"
                        alt="modifica dati" onclick="location.href = '{{route('modifyOrg',[$user->id])}}'">
                    <p id="pencil_text"><b>Modifica</b></p>
                </div>
                @endif
                <div class="cross_item user" title="Elimina utente">
                    <img id="cross" name="cross" class="action_item_clickable"
                        src="{{asset('css/themes/images/cross.png')}}" alt="cancella utente"
                        onclick="if (confirm('Eliminare l\'utente definitivamente?')) {location.href = '{{route('deleteuser',[$user->id])}}'; }">
                    <p id="cross_text"><b>ELIMINA</b></p>
                </div>
            </div>
        </div>
        @endif
        <br />
        <a href='{{route('insertOrg')}}'><button class='button clickable' type="button">Aggiungi una
                nuova
                organizzazione</button></a>
        <hr size="3" color="black" style="height:2px" />
        <section>
            <h3>Modifica FAQ</h3>
            <?php
            $i = 0;
            ?>
            @foreach($faqs as $faq)
            {{ Form::open(array('route' => 'modifyfaq','method'=>'post', 'class' => 'contact-form', 'id' => 'form'.$i)) }}
            {{Form::hidden('vecchiadomanda', $faq->domanda)}}
            <div class="faq-element">
                <div class="wrap-contact1">
                    {{ Form::text('domanda', $faq->domanda, ['class' => 'input','id' => 'domanda', 'style'=>'font-weight: bold;width:50em','disabled'=>'disabled','required' => '']) }}
                </div>
                <div class="wrap-contact1">
                    {{ Form::textarea('risposta', $faq->risposta, ['class' => 'input','id' => 'risposta', 'disabled'=>'disabled', 'rows'=>'5', 'style'=>'width:58em','required' => '']) }}
                </div>
                <div style="display:inline-flex">
                    <div class="pencil_item faq" title="Modifica FAQ">
                        <img id="pencil" name="pencil" class="pencil action_item_clickable"
                            src="{{asset('css/themes/images/pencil.png')}}" alt="modifica FAQ">
                        <p id="pencil_text"><b>Modifica la FAQ</b></p>
                    </div>
                    <div class="cross_item faq" title="Elimina FAQ">
                        @php
                        $domanda = urlencode($faq->domanda);
                        @endphp
                        <img id="cross" name="cross" class="cross action_item_clickable"
                            src="{{asset('css/themes/images/cross.png')}}" alt="elimina FAQ" onclick="if (confirm('Eliminare la FAQ definitivamente?')) {
                                         location.href = '{{route('deletefaq', [$domanda])}}'; }">
                        <p id="cross_text"><b>ELIMINA</b></p>
                    </div>
                </div>
            </div>
            <input id="salva" hidden type="submit" class="button clickable" value="Salva">
            <input type='reset' id='annulla' hidden class="button clickable" value="Annulla">
            {{ Form::close() }}
            <hr size="3" color="black" style="height:0.2px" />
            <?php $i = $i + 1; ?>
            @endforeach
            <div>
                {{ Form::open(array('route' => 'addfaq','method'=>'post', 'class' => 'contact-form', 'id' => 'addform')) }}
                <div class="plus_item" title="Aggiungi domanda">
                    <img id="plus" name="cross" class="action_item_clickable"
                        src="{{asset('css/themes/images/plus.png')}}" alt="aggiungi domanda" }">
                    <p id="plus_text"><b>Aggiungi domanda</b></p>
                </div>
                <div hidden id='nuovadomanda' class="wrap-input">
                    {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}
                    {{ Form::text('domanda', '', ['class' => 'input','id' => 'domanda','style'=>'font-weight: bold;width:50em','required' => '']) }}
                    @if ($errors->first('domanda'))
                    <ul class="errors">
                        @foreach ($errors->get('domanda') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div hidden id='nuovarisposta' class="wrap-input">
                    {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                    {{ Form::textarea('risposta', '', ['class' => 'input','id' => 'risposta', 'style'=>'width:50em', 'rows'=>'5','required' => '']) }}
                    @if ($errors->first('risposta'))
                    <ul class="errors">
                        @foreach ($errors->get('risposta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <input id="salvanuova" hidden type="submit" class="button clickable" value="Aggiungi">
                <input type='reset' id='annullanuova' hidden class="button clickable" value="Annulla">
            </div>
            {{ Form::close() }}
        </section>
</section>
@endsection
