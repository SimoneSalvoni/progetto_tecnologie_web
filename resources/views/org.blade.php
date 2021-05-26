@extends('layouts.public')
@section('title', 'Area organizzazione')
@section ('content')

<section  class="main-content">	

    <div  class="user_info">
        <h4>Nome utente: {{$user->organizzazione}}</h4>
        <h4>Email: {{$user->email}}</h4>
        <form>
            <input class="button" type="submit" value="Modifica dati personali" formaction="#" />
        </form>
        <hr size="3" color="black" style="height:0.5px" />
    </div>
        <?php>               
                <h4><span>Eventi imminenti</span></h4>
        <button class="button" onclick="location.href = '{{route('list')}}'" type="button" > <b>VAI ALLA LISTA COMPLETA DEGLI EVENTI</b></button>


        @isset($events)
        @for($i=0;$i<2;$i++)
            <section class="single_product">
                <div class="product_container clickable"; onclick="location.href ='{{route('event',[$events[$i]->id])}}'">
                    <!--<div class="image_item"><img src="concert.jpg" alt="Immagine dell'evento" class="product_image"></div>-->
                    <div class="image_item"> <img src="{{asset('locandine/'.$nearEvents[$i]->immagine)}}" class="product_image"></div>
                <div class="descr_container">
                    <div class="title_item"><h4>{{route('event',[$event[$i]->nome])}}
                        </h4></div>
                    <div class="info-container">
                        <div>LUOGO: {{route('event',[$events[$i]->regione])}}</div>
                        <div>DATA: {{route('event',[$events[$i]->data])}}</div>
                        <div>BIGLIETTI VENDUTI: {{route('event', [$events[$i]->bigliettiventuti])}} </div>
                        <div>INCASSO: {{route('event',[$events[$i]->incassototale])}}€ </div>
                    </div>
                    </div>
                </div>
                </div> 
            </section>
        @endfor
        @endisset

    </div>
    </section>
</section>

@endsection