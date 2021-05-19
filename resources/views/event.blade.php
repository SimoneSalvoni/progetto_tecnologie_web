@extends ('layouts.public')

@section ('content')
<section  class="main-content">		<!-- style=main.css c'era dentro, perché? -->		
    <div class="row">						
        <div class="span9">
            @if (isset($event->immagine))
           <?php $event->immagine= 'default.jpg'; ?>
            @endif
            <img src="{{ asset('locandine/'.$event->immagine) }}" {class="thumbnail"}>		
        </div>
        <div class="single_event">
            <h3><span>{{$event->nome}}</span></h3>
            <h5><strong>Organizzazione: {{$event->nomeorganizzazione}}</strong></h5>				
            <h5><strong>Data: {{$event->data}}</strong></h5>
            <h5><strong>Luogo: {{$event->regione.", ".$event->provincia.", ".$event->indirizzo." ".$event->numciv}}</strong></h5>								
            <h5><strong>Prezzo: {{$event->costo}}€
                    <?php //@include('helpers/prezzoEvento', 'evento' => $event)?>
                </strong></h5>
            <form class="form-inline" action="#">
                <!-- per il GUEST DEVE LINKARE AL LOGIN-->
                <h5>Biglietti rimanenti: {{$event->bigliettitotali-$event->bigliettivenduti}}</h5>
                <input class="btn btn-inverse" type="submit" value="Acquista"></input>
            </form>
            <div class="form-inline">
                <form class="form-inline">
                    <!-- IMPLEMENTA IL SUBMIT -->
                    <input class="btn btn-inverse" type="submit" value="Parteciper&ograve"></input>
                    <p>
                        Persone che parteciperanno: {{$event->partecipero}}
                    </p>
                </form>
            </div>	
        </div>							 
        <div class="span9">	
            <hr>
            <div class="container" style="width: 100%;">
                <p class="desc">
                    {{$event->descrizione}}
                </p>
                <div>  
                    <iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{$event->urlluogo}}"></iframe>  
                </div>
            </div>     
        </div>
    </div>
</section>
@endsection

