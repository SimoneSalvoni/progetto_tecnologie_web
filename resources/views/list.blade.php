@extends(layouts.public)

@section (content)
<section class="main-content">
    <section>
        <div class="outer_search">
            <div>
                <p style="padding:20px;float:left">
                    <b>Ricerca<br>avanzata</b>
                </p>
            </div>
            <div>
                <!-- action= della forma {{route('nome della rotta in web.php')}} -->
                <form method="post" id="search" name="search"enctype="multipart/form-data" action="#">
                    @csfr
                    <span class="search">
                        <label for=date class="control">Data</label>
                        <input type=month name=date id=date value="{{old('date')}}"/>
                    </span>
                    <span class="search">
                        <label for=reg class="control">Regione</label>
                        <!<!-- PER LA REGIONE DOVREMMO METTERE L'AUTO COMPLETAMENTO -->
                        <input type=text name=reg id=reg value="{{old('reg')}}" />
                    </span>
                    <span class="search">
                        <label for=org class="control">Società organizzatrice</label>
                        <input type=text name=org id=org value="{{old('org')}}" />
                    </span>
                    <span class="search">
                        <label for=desc class="control">Descrizione</label>
                        <input type=text name=desc id=desc value="{{old('desc')}}"/>
                    </span>
                    <input type= submit class="btn btn-inverse" style="vertical-align: super" value="Cerca"> 
                </form>
            </div>
        </div>
    </section>
    <!-- Qui inizia la lista degli eventi PLACEHOLDER. NON SO QUANTO MANUALE SIA LA GESTIONE DELLA PAGINAZIONE. IN OGNI CASO
    FOR EACH PENSO PER FARE LA LISTA DEGLI EVENTI-->
    <h4><span>Lista degli eventi</span></h4>
    @foreach($events as $event)
    <section class="single_product">
        <div class="product_container clickable" >
            <!--<div class="image_item"><img src="concert.jpg" alt="Immagine dell'evento" class="product_image"></div>-->
            <div class="image item">            
            </div>
            <div class="descr_container">
                <div class="title_item"><h4>{{$event->nome}}
                    </h4></div>
                <div class="descr_item">
                    {{$event->descrizione}}
                </div>
                <div class="info-container">
                    <div>REGIONE: </div>
                    <div>DATA: {{$event->data}}</div>
                    <div>COSTO: 
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <hr>
    <div class="pagination pagination-small pagination-centered">
        <ul>
            <li><a href="#">Prev</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </div>
</div>
</section>
@endsection