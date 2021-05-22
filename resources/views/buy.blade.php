@extends('layouts.user')
@section('title', 'Acquisto')
@section('content')
<section name='main_content'>
    <div name="dati-evento" class="raw">
        <h1 style="font-size:x-large">Dati evento</h1>
        <h2 style="font-size:medium">Data: xxxx</h2>
        <h2 style="font-size:medium">Locazione: Regione, Provincia, Indirizzo</h2>
        <h2 style="font-size:medium">Costo: </h2>
        <!-- <h2 style="font-size:medium">xxxx</h2>  METTILO-->
    </div>
    <h3><b>Seleziona il metodo di pagamento:</b></h3>
    <div class="container">
        <form class="container" id="form">
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
                <!-- BISOGNA FARE IN MODO CHE SE PREMO ENTER NON PARTA LA SUBMIT QUANDO QUESTO HA IL FOCUS -->
            </div>
            <div style="height: fit-content; width: fit-content">
                <h4 style="float:left">Costo complessivo: &nbsp</h4>
                <script type="text/javascript">
                    window.onload = function () {
                        var costo = 10; //inserire il COSTO VERO
                        document.getElementById('numBiglietti').setAttribute("onChange", 'update()');
                    };
                    function update() {
                        var numBiglietti = +document.getElementById('numBiglietti').value;
                        document.getElementById("tot").innerHTML = costo * numBiglietti;
                    }
                </script>
                <h4 class="tot_price" id="tot">10</h4>
            </div>
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