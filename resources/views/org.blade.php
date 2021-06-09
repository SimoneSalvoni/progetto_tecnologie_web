@extends('layouts.public')
@section('title', 'Area organizzazione')
@section ('content')

<section name="main content">
    <section class="main-content">
        <h3>Informazioni organizzatore</h3>
        <h6>Nome utente: {{$user->nomeutente}}</h3>
        <h6>Nome organizzazione: {{$user->organizzazione}}</h6>
        <h6>Email di riferimento: {{$user->email}}</h6>
        <hr size="3" color="black" style="height:0.5px" />


        <div>
            <h3>Eventi in programma organizzati</h3>
            <ul class="thumbnails">
                @if (isset($events))
                @for($i=0;$i<4;$i++) <li class="span3">
                    @isset($events[$i])
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href="{{route('event', [$events[$i]->id])}}"><img
                                    src="{{asset('locandine/'.$events[$i]->immagine)}}" id="carousel_image"
                                    alt="" /></a></p>
                        <a href="{{route('event', [$events[$i]->id])}}"
                            class="title">{{$events[$i]->nome}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$events[$i]->data}}</a><br />
                        <a href="{{route('event', [$events[$i]->id])}}" class="title">BIGLIETTI VENDUTI:
                            {{$events[$i]->bigliettivenduti}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INCASSO:
                            {{number_format($events[$i]->incassototale,2)}}€</a><br />
                    </div>
                    </li>
                    @endisset
                    @endfor
                    @endif
            </ul>
            @if (!isset($events)||count($events) == 0)
            <h5 class="center">NON HAI NESSUN EVENTO IN PROGRAMMA ORGANIZZATO</h5>
            {{-- <div id="filler"></div> --}}
            @endif
            <hr>
            <span>
                <a href="{{route('eventiorganizzati')}}"><button class="button clickable" type="button">Cronologia
                        eventi organizzati</button></a>
            </span>
            <span>
                <a href="{{route('newEvent')}}"><button class="button clickable" type="button">Aggiungi un nuovo
                        evento</button></a>
            </span>
        </div>
    </section>
</section>

@endsection
