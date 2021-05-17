@extends (layouts.public)

@section ('content')
<section  class="main-content">		<!<!-- style=main.css c'era dentro, perché? -->		
    <div class="row">						
        <div class="span9">
            <a href="themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="themes/images/ladies/1.jpg"></a>												
        </div>
        <div class="single_event">
            <h3><span>{{$event->nome}}</span></h3>
            <h5><strong>Organizzazione: {{$event->nomeorganizzazione}}</strong></h5>				
            <h5><strong>Data: {{$event->data}}</strong></h5>
            <h5><strong>Luogo: {{$event->luogo}}</strong></h5>								
            <h5><strong>Prezzo: 
                    @if(data>datascont) <!-- specifica!-->
                    <span style="font-size: large">
                        {{$event->costo-($event->costo*$event->sconto/100)}}&nbsp&nbsp&nbsp&nbsp
                    </span>
                    <span style="font-size: small">
                        <s>{{$event->costo}}</s>
                    </span>     
                    @else
                    {{$events->costo}}
                    @endif
                </strong></h5>
            <form class="form-inline" action="#">
                <h5>Biglietti rimanenti: {{$event->bigliettitotali-$event->bigliettivenduti}}</h5>
                <button class="btn btn-inverse" type="submit">Acquista</button>
            </form>
            <div class="form-inline">
                <form class="form-inline">
                    <!--<!-- IMPLEMENTA IL SUBMIT -->
                    <button class="btn btn-inverse" type="submit">Parteciperò</button>
                    <h5>
                        Persone che parteciperanno: {{$event->partecipero}}
                    </h5>
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

