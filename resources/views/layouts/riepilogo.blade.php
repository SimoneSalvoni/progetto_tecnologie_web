@extends('layouts.user')

@section('content')
<section name="main_content">
            <h2>
                Riepilogo acquisto
            </h2>
            <div class="container">
                <h5>
                    NOME EVENTO
                </h5>
                <div style="float:left; height:inherit">
                    <h5>
                        Data
                    </h5>
                    <h5>
                        Regione, PROVINCIA
                    </h5>
                    <h5>
                        INDIRIZZO
                    </h5>
                </div>
                <div style="display:inline-block;margin-left:25em;margin-top:1.5em">
                    <h5>Numero di biglietti: x</h5>
                    <h5>Importo complessivo: xxxx</h5>
                </div>
            </div>
            <br />
            <br />
            <div ">
                <form action="#">
                    <input class="button" type="submit" value="TORNA ALLA LISTA DEGLI EVENTI" />
                </form>
            </div>
        </section>
@endsection