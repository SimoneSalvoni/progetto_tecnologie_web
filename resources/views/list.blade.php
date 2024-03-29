@extends('layouts.public')
@section('title', 'Lista eventi')
@section('scripts')

<script>
    window.onload = function () {
        document.getElementById("reg").value =
                "<?php
                    if (old('reg')!=null) {
                         echo old('reg');
                    } else {
                         echo isset($_POST['reg']) ? $_POST['reg'] : '';
                    }
                ?>";
    document.getElementById("org").value =

            "<?php
                    if (old('org')!=null) {
                         echo old('org');
                    } else {
                         echo isset($_POST['org']) ? $_POST['org'] : '';
                    }
                ?>";
    document.getElementById("month").value =
            "<?php
                    if (old('month')!=null) {
                         echo old('month');
                    } else {
                         echo isset($_POST['month']) ? $_POST['month'] : '';
                    }
                ?>";
    document.getElementById("year").value =
            "<?php
                    if (old('year')!=null) {
                         echo old('year');
                    } else {
                         echo isset($_POST['year']) ? $_POST['year'] : '';
                    }
                ?>";
    document.getElementById("desc").value =
            "<?php
                    if (old('desc')!=null) {
                         echo old('desc');
                    } else {
                         echo isset($_POST['desc']) ? $_POST['desc'] : '';
                    }
                ?>";
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

                    <label for='year' class="control">Anno</label>
                    <input type="number" name="year" id="year" style='width:4em'>
                </span>
                <span class="search">
                    <label for='month' class="control">Mese</label>
                    <select name="month" id="month">
                        @foreach ($months as $month)
                        <option>{{$month}}</option>
                        @endforeach
                    </select>
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
                        <option>{{$organizzatore->organizzazione}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="search">
                    <label for="desc" class="control">Descrizione</label>
                    <input type="text" name="desc" id="desc" />
                </span>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Cerca">
                @if ($errors->first('year'))
                <ul class="errors">
                    @foreach ($errors->get('year') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('month'))
                <ul class="errors">
                    @foreach ($errors->get('month') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </form>

        </div>
    </section>
    <h4><span>Lista degli eventi</span></h4>
    @isset($events)
    @foreach($events as $event)
    <section class="single_product">
        <a href="{{route('event',[$event->id])}}">
            <div class="product_container clickable">
                <div class="image_item"> <img src="{{asset('locandine/'.$event->immagine)}}" class="product_image">
                </div>
                <div class="descr_container">
                    <div class="title_item">
                        <h4>
                            <p>{{$event->nome}}</p>
                        </h4>
                    </div>
                    <div class="descr_item">
                       {{$event->descrizione}}
                    </div>
                    <div class="info-container">
                        <p class='info_element'>ORGANIZZATORE: {{$event->nomeorganizzatore}} </p>
                        <p class='info_element'>REGIONE: {{$event->regione}} </p>
                        <p class='info_element'>DATA: {{$event->data}}</p>
                        @if ($OnSales[$event->id])
                        <p class='info_element'>COSTO: <span id="prezzo_daScontare">{{number_format($event->costo,2)}}€</span><span
                                id="prezzo_scontato">{{number_format(($event->costo - $event->costo/100*$event->sconto),2)}}€</span></p>
                        @else
                        <p class='info_element'>
                            COSTO: {{number_format($event->costo,2)}}€                          
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </a>
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
