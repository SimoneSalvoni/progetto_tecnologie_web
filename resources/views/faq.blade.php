@extends('layouts.public')


@section ('content')
@include('layouts.info')
<section id="faq">
    @foreach($FAQ as $q)
    <div class="faq-element">
    <h3>
        <b>{{$q->domanda}}</b>
    </h3>
    <p class="risposta">
        {{$q->risposta}}
    </p>
    </div>
    @endforeach

</section>
@endsection
