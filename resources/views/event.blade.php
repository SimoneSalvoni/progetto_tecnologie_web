@extends ('layouts.public')
@section('title', 'Evento')
@section ('content')
<section  class="main-content">		<!-- style=main.css c'era dentro, perché? -->	
    <div class="row">						
        <div class="event-image span">
            @if (!isset($event->immagine))
            <?php $event->immagine = 'default.jpg'; ?>
            @endif            
            <img src="{{ asset('locandine/'.$event->immagine) }}" class="thumbnail"> 		
        </div>
        <div class="single_event">
            <h3><span>{{$event->nome}}</span></h3>
            <h5><strong>Organizzazione: {{$event->nomeorganizzatore}}</strong></h5>				
            <h5><strong>Data: {{$event->data}}</strong></h5>
            <h5><strong>Luogo: {{$event->regione.", ".$event->provincia.", ".$event->indirizzo." ".$event->numciv}}</strong></h5>								
            <h5><strong>Prezzo: {{$event->costo}}€
                    <?php //@include('helpers/prezzoEvento', 'evento' => $event)?>
                </strong></h5>
            <form class="form-inline" method="get">
                <!-- per il GUEST DEVE LINKARE AL LOGIN-->
                <h5>Biglietti rimanenti: {{$event->bigliettitotali-$event->bigliettivenduti}}</h5>
                
                @guest
                <input class="btn btn-inverse" type="submit" value="Acquista" formaction="{{ route('login') }}"></input>
                @endguest

                @can('isUser')
                <input class="btn btn-inverse" type="submit" value="Acquista" formaction='{{ route('purchase', ['eventId' => $event->id])}}'></input>
                @endcan

                @can('isOrg')
                <!--tasti modifica e cancella? -->
                @endcan
            </form>
            <div class="form-inline">
                <form class="form-inline">
                    <!-- IMPLEMENTA IL SUBMIT -->
                    @guest
                    <input class="btn btn-inverse" type="submit" value="Parteciper&ograve" formaction="{{ route('login') }}"></input>
                    @endguest

                    @can('isUser')
                    <input class="btn btn-inverse" type="submit" value="Parteciper&ograve" formaction="{{ route('logout') }}"></input>
                    <!--Qua deve creare la partecipazione, forse va fatto da userController (come fatto per le creazioni di altri elementi)-->
                    @endcan

                    <p>
                        Persone che parteciperanno: {{$event->partecipero}}
                    </p>
                </form>
            </div>	
        </div>							 
        <div class="span9">	
            <hr>
            <div class="container" style="width: 100%; display:flex;">
                <div style="display:flex; flex-direction:column; width: 50%; float: left; margin-right: 50px;">
                    <div style="overflow-wrap: break-word;">
                        <h5>Descrizione</h5>
                        <p>{{$event->descrizione}}</p>
                    </div>                                                               
                    <div style="overflow-wrap: break-word;">
                        <h5>Come raggiungerci</h5>
                        <p>{{$event->indicazioni}}</p>
                    </div>
                </div>
                <div>  
                    <iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{$event->urlluogo}}"></iframe><small><a href="{{$event->urlluogo}}"""></a></small>  
                </div>
            </div>     
        </div>
    </div>
</section>
@endsection

