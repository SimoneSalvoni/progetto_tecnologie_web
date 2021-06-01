@extends('layouts.public')
@section('title', 'Informazioni')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $.fn.extend({
        toggleText: function (a, b) {
            return this.text(this.text() === b ? a : b);
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.risposta').hide();
        $('#domanda').click(function () {
            $(this).next('.risposta').slideToggle();
            $(this).children('span').toggleText('+', '-');
        });
    });
</script>
@endsection

@section ('content')
@include('layouts.info')
<section id="faq">
    @foreach($FAQ as $q)
    <div class="faq-element">
        <h3 id="domanda">
            <span>+</span><b>{{$q->domanda}}</b>
        </h3>
        <p class="risposta">
            {{$q->risposta}}
        </p>
        <hr>
    </div>
    @endforeach

</section>
@endsection
