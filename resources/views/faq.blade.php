@extends('layouts.public')
@section('title', 'Informazioni')

@section('scripts')
<script src='{{asset('js/faq.js')}}'></script>
@endsection

@section ('content')
@include('layouts.info')
<section id="faq">
    @foreach($FAQ as $q)
    <div class="hoverabile">
    <div class="faq-element">
        <h3 class="domanda">
            <span class="più">+</span><b>{{$q->domanda}}</b>
        </h3>
        <p class="risposta">
            {{$q->risposta}}
        </p>
        <hr>
    </div>
    </div>
    @endforeach

</section>
@endsection
