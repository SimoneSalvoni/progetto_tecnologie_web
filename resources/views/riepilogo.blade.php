@extends('layouts.public')
@section('title', 'Riepilogo acquisto')
@section('content')
<section name="main_content">
            <h2>
                Riepilogo acquisto
            </h2>
            <div class="container">
                <h5>
                    {{$event->nome}}
                </h5>
                <div style="float:left; height:inherit">
                    <h5>
                        {{$event->data}}
                    </h5>
                    <h5>
                        {{$event->regione}}, {{$event->provincia}}
                    </h5>
                    <h5>
                        {{$event->indirizzo}} {{$event->numciv}}
                    </h5>
                </div>
                <div style="display:inline-block;margin-left:25em;margin-top:1.5em">
                    <h5>Numero di biglietti: {{$numBiglietti}}</h5>
                    <h5>Importo complessivo: {{$importo}}</h5>
                </div>
            </div>
            <br />
            <br />
            <div>
                <form type="get" action="{{route('list')}}">
                    <input class="button clickabel" type="submit" value="TORNA ALLA LISTA DEGLI EVENTI" />
                </form>
            </div>
        </section>
@endsection