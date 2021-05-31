@extends ('layouts.public')
@section('title', 'Evento')

@section ('scripts')
<script src='{{asset('js/block_purchase.js')}}'></script>
@endsection

@section ('content')
<section class="main-content">
    <div class="row">
        <div class="event-image span">
            @if (!isset($event->immagine))
            <?php $event->immagine = 'default.jpg'; ?>
            @endif
            <img src="{{ asset('locandine/'.$event->immagine) }}" class="thumbnail">
        </div>
        <div class="single_event" style="float:left">
            <h3><span>{{$event->nome}}</span></h3>
            <h5>Organizzazione: {{$event->nomeorganizzatore}}</h5>
            <h5>Data: {{$event->data}}</h5>
            <h5>Luogo: {{$event->regione.", ".$event->provincia.", ".$event->indirizzo." ".$event->numciv}}</h5>
            <h5>Prezzo: {{$event->costo}}€</h5>
            <h5 style='display: inline'>Biglietti rimanenti:&nbsp</h5>
            <h5 id="biglietti" style='display: inline'>{{$event->bigliettitotali-$event->bigliettivenduti}}</h5>
            <br /><br />

            <form class="form-inline" method="get">
                @guest
                <input class="bigbutton clickable" type="submit" value="Acquista"
                       formaction="{{ route('login') }}">
                @endguest

                @can('isUser')
                @if (($event->bigliettitotali-$event->bigliettivenduti)>0)
                <input class="bigbutton clickable" id="buy" type="submit" value="ACQUISTA"
                       formaction='{{ route('purchase', ['eventId' => $event->id])}}'>
                @else
                <input class="bigbutton clickable" style="display:inline" id="buy" type="submit" value="ACQUISTA"
                       formaction=''>
                <h5 style="display:inline;color: red">&nbspBiglietti esauriti!</h5>
                @endif
                @endcan     

            </form>
            <div class="form-inline">
                <form class="form-inline">
                    <!-- IMPLEMENTA IL SUBMIT -->
                    @guest
                    <input class="btn btn-inverse" type="submit" value="Parteciper&ograve"
                           formaction="{{ route('login') }}"></input>
                    @endguest
                    @can('isUser')
                    @if ($partecipa)
                    <input class="btn btn-inverse" type="submit" value="Cancella"
                           formaction="{{ route('delPart') }}"></input>
                    @else
                    <input class="btn btn-inverse" type="submit" value="Parteciper&ograve"
                           formaction="{{ route('participate', ['eventId' => $event->id]) }}"></input>

                    @endif
                    <!--Qua deve creare la partecipazione, forse va fatto da userController (come fatto per le creazioni di altri elementi)-->
                    @endcan
                    <p>
                        Persone che parteciperanno: {{$event->parteciperò}}
                    </p>                    
                </form>
            </div>
        </div>
        @can('isOrg')
        @if(($event->nomeorganizzatore)==(auth()->user()->organizzazione))
        <div class="action_div">
            <div class="pencil_item" title="Modifica evento">
                <img id="pencil" name="pencil" class="action_item_clickable"
                     onclick="location.href = '{{route('modifyEvent',[$event->id])}}'"
                     src="{{asset('css/themes/images/pencil.png')}}" alt="modifica evento">
            </div>
            <p id="pencil_text">Modifica</p>
            <div class="cross_item" title="Elimina evento">
                <img id="cross" name="cross" class="action_item_clickable"
                     src="{{asset('css/themes/images/cross.png')}}" alt="cancella evento"
                     onclick="if (confirm('Eliminare l\'evento definitivamente?')){location.href = '{{route('delete',[$event->id])}}'}">
                <p id="cross_text">Elimina</p>
            </div>
        </div>
        @endif
        @endcan
        <div class="span9">
            <hr>
            <div class="event-container">
                <div class='event-bottom'>
                    <div>
                        <h5>Descrizione</h5>
                        <p>{{$event->descrizione}}</p>
                    </div>
                    <div>
                        <h5>Come raggiungerci</h5>
                        <p>{{$event->comeraggiungerci}}</p>
                    </div>
                </div>
                <div>
                    <iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="{{$event->urlluogo}}"></iframe><small><a href="{{$event->urlluogo}}"""></a></small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
