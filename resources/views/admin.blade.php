@extends('layouts.public')
@section('title', 'Area riservata')
@section('scripts')
<script src='{{asset('js/admin.js')}}'></script>
<script>
    $(document).ready(function () {
        $('#usertype').attr('value',"<?php echo isset($_POST['usertype']) ? $_POST['usertype'] : '' ?>" );
    });
</script>
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
                <form method='post' action='{{route('searchuser')}}'>
                    <label for="usertype" class="control" style="margin-bottom:-1.55em"> Selezione la tipologia di utente</label>
                    <select id="usertype"  name="usertype">
                        <option value="client">Cliente</option>
                        <option value="org">Organizzatore</option>
                    </select>
                    <span class="search">
                        <label id='labeltext' for="username" class="control"></label>
                        <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''  ?>"/>
                    </span>
                    <input type=submit class="btn btn-inverse" style="vertical-align: super" value="Cerca utente">
                </form>
            </div>
        </div>
    </section>
    @if(isset($user))
    <div class="single_product" style="height:120px">
        <div style="width:fit-content;float:left">
            <p><b>Nome utente: {{$user->nomeutente}}</b></p>
            <p><b>Email: {{$user->email}}</b></p>
            <p><b>Nome: {{$user->nome}}</b> </p>
            <p><b>Cognome: {{$user->cognome}}</b></p>
        </div>
        <div style="height:inherit">
            <div id="pencil_item" title="Elimina utente" style="margin: auto 15em; height: 50%;justify-content:center;display:none">
                <img id="pencil" name="pencil" class="action_item_clickable"
                     src="pencil.png" alt="modifica dati"
                     href='#'> <!--INSERISCI LINK A MODIFICA E CANCELLAZIONE-->
                <p id="pencil_text"><b>Modifica</b></p>
            </div>
            <div id="cross_item" title="Elimina utente" style=" margin: auto 15em;height:50%;justify-content:center">
                <img id="cross" name="cross" class="action_item_clickable"
                     src="cross.png" alt="cancella utente"
                     onclick="if (confirm('Eliminare l\'utente definitivamente?')) {location.href = '#';}">
                <p id="cross_text"><b>ELIMINA</b></p>
            </div>
        </div>
    </div>
    @endif
    <hr size="3" color="black" style="height:0.5px" />
    <div>
        <h3>Modifica FAQ</h3>
        @foreach($faqs as $faq)
        <div class="faq-element" >
            <div style="display:flex">
                <h3 style="width:fit-content">
                    <b>{{$faq->domanda}}</b>
                </h3>
                <div id="pencil_item" style="margin-left:2em;margin-top:-1em">
                    <img id="pencil" name="pencil" class="action_item_clickable"
                         src="pencil.png" alt="modifica dati"
                         href='#'> <!--LINK A MODIFICA-->
                    <p id="pencil_text"><b>Modifica</b></p>
                </div>
            </div>
            <p class="risposta">
                {{$faq->risposta}}
            </p>
        </div>
        @endforeach
    </div>
</section>
@endsection