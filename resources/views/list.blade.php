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
                    <input type="month" name="date" id="date" placeholder="YYYY-MM"
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
                        <p> {{$event->descrizione}} </p>
                    </div>
                    <div class="info-container">
<<<<<<< HEAD
                        <div>ORGANIZZATORE: {{$event->nomeorganizzatore}} </div>
                        <div>REGIONE: {{$event->regione}} </div>
                        <div>DATA: {{$event->data}}</div>
 @include('helpers/prezzoEvento', ['evento' => $event])
                        </div>
=======
                        <p>ORGANIZZATORE: {{$event->nomeorganizzatore}} </p>
                        <p>REGIONE: {{$event->regione}} </p>
                        <p>DATA: {{$event->data}}</p>
                        @if ($OnSales[$event->id])
                        <p>COSTO: <span id="prezzo_daScontare">{{$event->costo}}€</span><span
                                id="prezzo_scontato">{{$event->costo - $event->costo/100*$event->sconto}}€</span>
                        </p>
<<<<<<< HEAD
                        @else
                        <p>COSTO: {{$event->costo}}€ </p>
                        @endif
=======
>>>>>>> 017e98ec29927ad0425b4bc68023f89bcb7d49ed
>>>>>>> 7baa5c041b5e4335a8a7487a39894c2fe62cf536
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
