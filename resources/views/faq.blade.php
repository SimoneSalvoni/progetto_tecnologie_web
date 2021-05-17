@extends('layouts.public')


@section ('content')
@include(layouts.info)
<section id="faq">
@foreach($FAQ as $q)
<h1>
    <b>{{$q->domanda}}</b>
</h1>
<h2>
    {{$q->risposta}}
</h2>
@endforeach
</section>
@endsection
