@extends('layouts.public')
@section('title', 'Area riservata')
@section('content')
<section name="main content">
    <section class="main-content">
        <h3>Informazioni Account</h3>
        <h6>Nome utente: {{$user->nomeutente}}</h6>
        <h6>Email: {{$user->email}}</h6>
        <h6>Nome: {{$user->nome}} </h6>
        <h6>Cognome: {{$user->cognome}}</h6>
        <a href="{{route('ModificaProfilo')}}"><button class="button clickable" type="button">Modifica dati
                personali</button></a>
        <hr size="3" color="black" style="height:0.5px" />
        <div>
            <h3>Eventi in programma</h3>
            <ul class="thumbnails">
                @if (isset($nearEvents))
                @foreach($nearEvents as $event)
                <li class="span3">
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href="{{route('event', [$event->id])}}"><img
                                    src="{{asset('locandine/'.$event->immagine)}}" id="carousel_imageP" alt="" /></a></p>
                        <a href="{{route('event', [$event->id])}}"
                            class="title">{{$event->nome}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$event->data}}</a><br />
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
            @if (!isset($nearEvents)||count($nearEvents) == 0)
            <h5 class="center">NON HAI NESSUN EVENTO IN PROGRAMMA</h5>
            {{-- <div id="filler"></div> --}}
            @endif
            <hr>
            <a href="{{route('cronologiaAcquisti')}}"><button class="button clickable" type="button">Cronologia
                    Acquisti</button></a>
        </div>
    </section>
</section>

@endsection
