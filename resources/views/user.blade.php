
@extends('layouts.public')
@section('title', 'Area riservata')
@section('content')

<section id="main-content">
    <div   margin: auto>
        <h4>Nome utente: {{$user->nomeutente}}</h4>
        <h4>Email: {{$user->email}}</h4>
        <h4>Nome: {{$user->nome}}</h4>
        <h4>Cognome: {{$user->cognome}}</h4>
        <form>
            <input class="button" type="submit" value="Modifica dati personali" formaction="#" />
        </form>
        <hr size="3" color="black" style="height:0.5px" />
    </div>
    <div>
                    <span class="pull-left"><span class="text"><span class="line">Eventi in programma</span></span></span>
        <ul class="thumbnails">
            @if (isset($nearEvents))
            @foreach($nearEvents as $event)
            <li class="span3">
                <div class="product-box">
                    <span class="sale_tag"></span>
                    <p><a href="#"><img src="{{$event->immagine}}" alt="" /></a></p>
                    <a href="#" class="title">{{$event->nome}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$event->data}}</a><br />
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        <form>
            <input class="button" type="button" value="Cronologia acquisti" formaction="#" /> <!--PORTA ALLA CRONOLOGIA ACQUISTI-->
        </form>
    </div>
</section>

@endsection