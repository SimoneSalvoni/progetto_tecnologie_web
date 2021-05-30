@extends('layouts.public')
@section('title','Cronologia Acquisti')
@section('content')
<h4><span>Eventi Organizzati</span></h4>
@isset($events)
@foreach ($events as $event)
<section class="main-content">
    <section class="single_product">
        <div class="product_container">
            <div class="image_item">
                <img src="{{ asset('locandine/'.$event->immagine)}}" class="product_image" alt="">
            </div>
            <div class="descr_container">
                <div class="title_item">
                    <h4>{{$event->nome}}</h4>
                </div>
                <div class="inner_descr_container">
                    <div class="purchase_descr_item">
                        @if ($event->bigliettitotali !=0)
                        Biglietti venduti/biglietti totali: {{$event->bigliettivenduti}}/{{$event->bigliettitotali}}
                        @else
                        Biglietti venduti/biglietti totali: 0
                        @endif
                    </div>
                    <div class="purchase_descr_item">
                        Percentuale biglietti venduti: {{($event->bigliettivenduti / $event->bigliettitotali)*100}}%
                    </div>
                    <div class="purchase_descr_item">
                        Incasso totale: {{$event->incassototale}}
                    </div>
                </div>
            </div>
            <div class="action_div">
                <div id="pencil_item" title="Modifica evento">
                    <img id="pencil" name="pencil" class="action_item_clickable"
                        onclick="location.href = '{{route('modifyEvent',[$event->id])}}'"
                        src="{{asset('css/themes/images/pencil.png')}}" alt="modifica evento">
                </div>
                <p id="pencil_text">Modifica</p>
                <div id="cross_item" title="Elimina evento">
                    <img id="cross" name="cross" class="action_item_clickable"
                        src="{{asset('css/themes/images/cross.png')}}" alt="cancella evento"
                        onclick="if(confirm('Eliminare l\'evento definitivamente?')){location.href = '{{route('delete',[$event->id])}}'}">
                    <p id="cross_text">Elimina</p>
                </div>
                <div title="Visualizza dettagli evento">
                    <a href="{{route('event',[$event->id])}}"><button id="info_button" class="bigbutton clickable"
                            type="button">Visualizza
                            dettagli</button></a>
                </div>
            </div>
        </div>
    </section>
</section>
@endforeach
@include('pagination.paginator', ['paginator' => $events])
@endisset
@endsection
