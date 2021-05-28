@extends('layouts.public')
@section('title', 'Area organizzazione')
@section ('content')

<section name="main content">
    <section class="main-content">
        <h3>Informazioni Organizzatore</h3>
        <h6>Nome organizzazione: {{$user->organizzazione}}</h6>
        <h6>Email di riferimento: {{$user->email}}</h6>
        <hr size="3" color="black" style="height:0.5px" />

        <div>
            <h3>Eventi in programma organizzati</h3>
            <ul class="thumbnails">
                @if (isset($events))
                @for($i=0;$i<4;$i++) <li class="span3">
                    @isset($events[i])
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href="{{route('event', [$events[$i]->id])}}"><img
                                    src="{{asset('locandine/'.$events[$i]->immagine)}}" alt="" /></a></p>
                        <a href="{{route('event', [$events[$i]->id])}}"
                            class="title">{{$events[$i]->nome}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$events[$i]->data}}</a><br />
                        <a href="{{route('event', [$events[$i]->id])}}" class="title">BIGLIETTI VENDUTI:
                            {{$events[$i]->bigliettivenduti}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INCASSO:
                            {{$events[$i]->incassototale}}€</a><br />
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
            <button class="button" type="button" onclick="location.href='{{route('eventiorganizzati')}}'">Cronologia
                eventi organizzati</button>
        </div>
    </section>
</section>

@endsection
