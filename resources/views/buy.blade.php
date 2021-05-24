@extends('layouts.user')

@section('title', 'Acquisto')

@section ('scripts')
<script src='resources/js/purchase.js'></script>
endsection

@section('content')
<section name='main_content'>
    <div name="dati-evento">
        <h1 style="font-size:x-large">Dati evento</h1>
        <h2 style="font-size:medium">Data: {{$event->data}}</h2>
        <h2 style="font-size:medium">Locazione: {{$event->regione}}, {{$event->provincia}}, 
            {{$event->indirizzo}} {{$event->numciv}}</h2>
        <h2 style="font-size:medium;display: inline">Costo: </h2>
        <h2 style="font-size:medium;display: inline" id="costo">{{$event->costo}}</h2>
    </div>
    <h3><b>Seleziona il metodo di pagamento:</b></h3>
    <div class="container">
        <form class="container" id="form" action="{{route('buy')"}}>
              <div class="container_payment">
            <div style="height:inherit;float:left">
                <input type="radio" id="pay" name="pay" value="poste">
                <img class="payment" src="postepay.jpg">
            </div>
            <div style="height:inherit;float:left">
                <input type="radio" id="pay" name="pay" value="pay">
                <img src="paypal.png" class="payment">
            </div>
            <div style="height:inherit">
                <input type="radio" id="pay" name="pay" value="conto">
                <img src="conto.png" class="payment">
            </div>
    </div>
    <div style="margin:auto">
        <br>
        <label style="float:left" for="num"><h5>Numero di biglietti: </h5></label>
        <input class="num_biglietti" type="number" id="numBiglietti" name="numBiglietti" value="1" min='1'">
    </div>
    <div style="height: fit-content; width: fit-content">
        <h4 style="float:left">Costo complessivo: &nbsp</h4>
        <h4 class="tot_price" id="tot">{{$event->costo}}</h4>
    </div>
    <input type="hidden" name="costototale" id="costototale" value="{{$event->costo}}">
    <input type='hidden' name='nomeutente' value='{{auth()->user()->nomeutente}}'>
    <input type='hidden' name='idevento' value='{{$event->id}}'>
    <input type='hidden' name='nomeevento' value='{{$event->nome}}'>
    <input type='hidden' name='data' value='{{$event->data}}'>
    <br />
    <br />
    <br />
    <br />
    <br />
    <div style="display: flex;flex-wrap: wrap;justify-content: space-evenly">
        <input style="width:15em;height:3em" class="button" type="submit" id="buy" name="buy" value="COMPRA" />
        <input style="width:15em;height:3em" class="button" type="reset" id="annulla" name="annulla" value="ANNULLA" />
    </div>
</form>
</div>
</section>
@endsection