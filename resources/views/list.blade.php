@extends('layouts.public')
@section('title', 'Lista eventi')
@section('scripts')

<script src='{{asset('js/eventsList.js')}}'></script>
<script>
    window.onload = function () {
    document.getElementById("reg").value =
        "<?php echo isset($_POST['reg']) ? $_POST['reg'] : '' ?>";
    document.getElementById("org").value =
        "<?php echo isset($_POST['org']) ? $_POST['org'] : '' ?>";
 };
</script>
@endsection
@section ('content')
<section class="main-content">
    <section>
        <div class="outer_search">
            <div>
                <p style="padding:20px;float:left">
                    <b>Ricerca<br>avanzata</b>
                </p>
            </div>

            <form method="post" id="search" name="search" enctype="multipart/form-data"
                action="{{route('list.search')}}">
                @csrf
                <span class="search">
                    <label for="date" class="control">Data</label>
                    <input type="month" name="date" id="date"
                        value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>">
                </span>
                <span class="search">
                    <label for="reg" class="control">Regione</label>
                    <select name="reg" id="reg">
                        @foreach ($regions as $region)
                        <option>{{$region}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="search">
                    <label for="org" class="control">Società organizzatrice</label>
                    <select name="org" id="org">
                        @foreach ($organizzatori as $organizzatore)
                        <option>{{$organizzatore->nomeorganizzatore}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="search">
                    <label for="desc" class="control">Descrizione</label>
                    <input type="text" name="desc" id="desc"
                        value="<?php echo isset($_POST['desc']) ? $_POST['desc'] : '' ?>" />
                </span>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Cerca">
            </form>

        </div>
    </section>
    <h4><span>Lista degli eventi</span></h4>
    @isset($events)
    @foreach($events as $event)
    <section class="single_product">
        <div class="product_container clickable" ; onclick="location.href ='{{route('event',[$event->id])}}'">
            <!--<div class="image_item"><img src="concert.jpg" alt="Immagine dell'evento" class="product_image"></div>-->
            <div class="image_item"> <img src="{{asset('locandine/'.$event->immagine)}}" class="product_image"></div>
            <div class="descr_container">
                <div class="title_item">
                    <h4>{{$event->nome}}
                    </h4>
                </div>
                <div class="descr_item">
                    {{$event->descrizione}}
                </div>
                <div class="info-container">
                    <div>REGIONE: {{$event->regione}} </div>
                    <div>DATA: {{$event->data}}</div>
                    <!--   @include('helpers/prezzoEvento', ['evento' => $event])-->
                    <div>COSTO: {{$event->costo}}€
                        <!-- TODO: Lo sconto è da fare -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    @include('pagination.paginator', ['paginator' => $events])

    @endisset
    @if (!isset($events)||count($events) == 0)
    <h5 class="center">NESSUN EVENTO RISPETTA I PARAMETRI INSERITI</h5>
    {{-- <div id="filler"></div> --}}
    @endif
    <hr>

</section>
@endsection
