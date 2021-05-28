@extends('layouts.public')
@section('title', 'Area riservata')
@section('content')
<section name="main content">
    <section class="main-content">
        <h3>Informazioni Account</h3>
        <p>Nome utente: {{$user->nomeutente}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Nome: {{$user->nome}} </p>
        <p>Cognome: {{$user->cognome}}</p>
        <button class="button" type="button" onclick="location.href='{{route('ModificaProfilo')}}'">Modifcia dati
            personali</button>
        <hr size="3" color="black" style="height:0.5px" />
        <div>
            <h3>Eventi in porgramma</h3>
            <ul class="thumbnails">
                @if (isset($nearEvents))
                @foreach($nearEvents as $event)
                <li class="span3">
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href="{{route('event', [$event->id])}}"><img
                                    src="{{asset('locandine/'.$event->immagine)}}" alt="" /></a></p>
                        <a href="{{route('event', [$event->id])}}"
                            class="title">{{$event->nome}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$event->data}}</a><br />
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        @if (!isset($event)||count($event) == 0)
        <h5 class="center">NON HAI NESSUN EVENTO IN PROGRAMMA</h5>
        {{-- <div id="filler"></div> --}}
        @endif
        <hr>
        <button class="button" type="button" onclick="location.href='{{route('cronologiaAcquisti')}}'">Cronologia Acquisti</button>
        </div>
    </section>
</section>

@endsection
