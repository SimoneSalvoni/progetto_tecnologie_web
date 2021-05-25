@extends('layouts.public')
@section('title','Cronologia Acquisti')
@section('content')
@isset($events)
@foreach ($events as $event)
<section class="main-content">
    <h4><span>Eventi Organizzati</span></h4>
    <section class="single_product">
        <div class="product_container clickable" ; onclick="location.href='{{route('event',[$event->id])}}'">
            <div class="image_item">
                <img src="{{ asset('locandine/'.$event->immagine)}}" class="product_image" alt="">
            </div>
            <div class="descr_container">
                <div class="title_item">
                    <h4>{{$event->nome}}</h4>
                </div>
                <div class="inner_descr_container">
                    <div class="purchase_descr_item">
                        Biglietti venduti/biglietti totali: {{$event->bigliettivenduti / $event->bigliettitotali}}
                    </div>
                    <div class="purchase_descr_item">
                        Percentuale biglietti venduti: {{$event->bigliettivenduti}}
                    </div>
                    <div class="purchase_descr_item">
                        Incasso totale: {{$event->incassototale}}
                    </div>
                </div>
            </div>
            <div class="action_div" ; onclick="location.href='{{route('event',[$event->id])}}'">
                <div id="pencil_item">
                    <img id="pencil" class="action_item_clickable" src="themes/images/pencil.png" alt="modifica evento">
                </div>
                <div id="cross_item">
                    <img id="cross" class="action_item_clickable" src="themes/images/cross.png" alt="cancella evento">
                </div>

            </div>
        </div>
    </section>
</section>
@endforeach
@endisset
