@extends('layouts.public')
@section('title','Cronologia Acquisti')
@section('content')
@isset ($purchases)
<h4><span>Lista degli acquisti</span></h4>
@for($i = 0; $i<count($purchases); $i++) <section class="main-content">
    <section class="single_product">
        <div class="product_container {{--clickable--}}"
            {{--; onclick="location.href='{{route('event',[$event->id])}}'--}}">
            <div class="image_item">
                <img src="{{ asset('locandine/'.$images[$i])}}" class="product_image" alt="">
            </div>
            <div class="descr_container ">
                <div class="title_item">
                    <h4>{{$purchases[$i]->nomeevento}}</h4>
                </div>
                <div class="inner_descr_container">
                    <div class="purchase_descr_item">
                        Acquistato il: {{$purchases[$i]->data}}
                    </div>
                    <div class="purchase_descr_item">
                        Numero biglietti: {{$purchases[$i]->numerobiglietti}}
                    </div>
                    <div class="purchase_descr_item">
                        Totale spesa: {{$purchases[$i]->costototale}}€
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
    @endfor

    @include('pagination.paginator', ['paginator' => $purchases])

    @if (count($purchases) == 0)
    <h4 class="center">La cronologia degli acquisti è ancora vuota</h4>
    @endif

    @endisset
    @endsection
