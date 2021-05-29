@extends('layouts.public')
@section('title', 'Area riservata')
@section('scripts')
<script src='{{asset('js/admin.js')}}'></script>
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
                <form>
                    @csrf
                    <label for="usertype" class="control" style="margin-bottom:-1.55em"> Selezione la tipologia di utente</label>
                    <select id="usertype"  name="usertype">                         
                        <option id='c' value="client">Cliente</option>
                        @if(isset($user)&&($user->livello==3))
                        <option id='o' value="org" selected>Organizzazione</option>
                        @else
                        <option id='o' value="org">Organizzazione</option>
                        @endif     
                    </select>                   
                    <span class="search">
                        <label id='labeltext' for="name" class="control"></label>
                        @if(isset($user)&&($user->livello==2))
                        <input type="text" name="name" id="name" value="{{$user->nomeutente}}"/>
                        @elseif(isset($user)&&($user->livello==3))
                        <input type="text" name="name" id="name" value="{{$user->nomeutente}}"/>
                        @else
                        <input type="text" name="name" id="name"/>
                        @endif
                    </span>
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    </span>
                    @endif
                    <button type=submit method="post" class="btn btn-inverse" style="vertical-align: super" formaction="{{route('searchuser')}}">Cerca utente</button>
                </form>    
            </div>
        </div>
    </section>
    @if(isset($user))
    @if($user->livello==2)
    <div class="single_product" style="height:120px">
        <div style="width:fit-content;float:left">
            <p><b>Nome utente: {{$user->nomeutente}}</b></p>
            <p><b>Email: {{$user->email}}</b></p>
            <p><b>Nome: {{$user->nome}}</b> </p>
            <p><b>Cognome: {{$user->cognome}}</b></p>
        </div>
        @else
        <div class="single_product" style="height:90px">
            <div style="width:fit-content;float:left">
                <p><b>Nome utente: {{$user->nomeutente}}</b></p>
                <p><b>Nome organizzazione: {{$user->organizzazione}}</b></p>
                <p><b>Email: {{$user->email}}</b></p>
            </div>
            @endif
            <div style="height:inherit">
                @if($user->livello==3)
                <div class="pencil_item" title="Modifica dati utente" style="margin: -0.5em 15em 0 15em; height: 50%;justify-content:center">
                    <img id="pencil" name="pencil" class="action_item_clickable"
                         src="{{asset('css/themes/images/pencil.png')}}" alt="modifica dati"
                         href='#'> <!--INSERISCI LINK A MODIFICA E CANCELLAZIONE-->
                    <p id="pencil_text"><b>Modifica</b></p>
                </div>
                @endif
                <div id="cross_item" title="Elimina utente" style=" margin: auto 15em;height:50%;justify-content:center">
                    <img id="cross" name="cross" class="action_item_clickable"
                         src="{{asset('css/themes/images/cross.png')}}" alt="cancella utente"
                         onclick="if (confirm('Eliminare l\'utente definitivamente?')) {location.href = '#';}">
                    <p id="cross_text"><b>ELIMINA</b></p>
                </div>
            </div>
        </div>
        @endif
        <br/>
        <a href='#'><button class='button clickable'>Aggiungi una nuova organizzazione</button></a>
        <hr size="3" color="black" style="height:0.5px" />
        <div>
            <h3>Modifica FAQ</h3>
            @foreach($faqs as $faq)
            <div class="faq-element" >
                <div style="display:flex">
                    <h3 style="width:fit-content">
                        <b>{{$faq->domanda}}</b>
                    </h3>
                    <div class="pencil_item" title="Modifica FAQ" style="margin-left:2em;margin-top:-1em">
                        <img id="pencil" name="pencil" class="action_item_clickable"
                             src="{{asset('css/themes/images/pencil.png')}}" alt="modifica FAQ"
                             href='#'> <!--LINK A MODIFICA-->
                        <p id="pencil_text"><b>Modifica</b></p>
                    </div>
                    <div id="cross_item" title="Elimina FAQ" style=" margin: -1.2em 0 0 1em;height:50%;justify-content:center">
                        <img id="cross" name="cross" class="action_item_clickable"
                             src="{{asset('css/themes/images/cross.png')}}" alt="elimina FAQ"
                             onclick="if (confirm('Eliminare la FAQ definitivamente?')) {
                                         location.href = '#';
                                     }">
                        <p id="cross_text"><b>ELIMINA</b></p>
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