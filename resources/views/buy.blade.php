@extends('layouts.public')

@section('title', 'Acquisto')

@section ('scripts')
<script src='{{asset('js/purchase.js')}}'></script>
@endsection


@section('content')
<section name='main_content'>
    <div name="dati-evento">
        <h1 style="font-size:x-large">Dati evento</h1>
        <h2 style="font-size:medium">Data: {{$event->data}}</h2>
        <h2 style="font-size:medium">Orario: {{$event->orario}}</h2>
        <h2 style="font-size:medium">Location: {{$event->regione}}, {{$event->provincia}},
            {{$event->indirizzo}} {{$event->numciv}}</h2>
        <h2 style="font-size:medium;display: inline">Costo: </h2>
        @if ($saldo)
        <h2 style="font-size:medium;display: inline" id="costo">{{number_format(($event->costo - $event->costo/100*$event->sconto),2)}}</h2>
        @else
        <h2 style="font-size:medium;display: inline" id="costo">{{number_format($event->costo,2)}}</h2>
        @endif
        <h2 style="font-size:medium;display: inline">€</h2>
    </div>
    <h3><b>Seleziona il metodo di pagamento:</b></h3>
    <div class="container">
        <form class="container" method="POST" action="{{route('buy')}}">
            @csrf
            <div class="container_payment">
                <div style="height:inherit">
                    <input type="radio" id="pay1" name="pay" value="poste">
                    <img id="img1" class="payment" src="{{asset('siteimgs/postepay.jpg')}}">
                </div>
                <div style="height:inherit">
                    <input type="radio" id="pay2" name="pay" value="pay">
                    <img id="img2" src="{{asset('siteimgs/paypal.png')}}" class="payment">
                </div>
                <div style="height:inherit">
                    <input type="radio" id="pay3" name="pay" value="conto">
                    <img id="img3" src="{{asset('siteimgs/conto.png')}}" class="payment">
                </div>
            </div>
            @if ($errors->first('pay'))
            <ul class="errors">
                @foreach ($errors->get('pay') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <div style="margin:auto">
                <br>
                <label style="float:left" for="num"><h5>Numero di biglietti: </h5></label>
                <input class="num_biglietti" type="number" id='numBiglietti' name="numerobiglietti" value='1' min='1'">
                <ul class="errors">
                    @foreach ($errors->get('numerobiglietti') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            <h4 style="display:inline">Costo complessivo: &nbsp</h4>
            <h4 style="display:inline" id="tot"></h4>
            <h4 style="display:inline"> € </h4>
            <input type="hidden" name="costototale" id="costototale">
            <input type='hidden' name='nomeutente' value='{{auth()->user()->nomeutente}}'>
            <input type='hidden' name='idevento' value='{{$event->id}}'>
            <input type='hidden' name='nomeevento' value='{{$event->nome}}'>
            <input type='hidden' name='data' value='{{$event->data}}'>
            <br />
            <br />
            <br />
            <div class="submit_goback">
                <button type="submit" class="bigbutton clickable" style="width:15em">COMPRA</button>
                <input style="width:15em"  class="bigbutton clickable" type="submit" formmethod="GET" id="annulla" name="annulla" value="ANNULLA" formaction='{{route('event', $event->id)}}' />
            </div>
        </form>
    </div>
</section>
@endsection
