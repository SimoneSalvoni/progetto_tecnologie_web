@extends('layouts.public')

@section ('content')
<!--<div id="wrapper" class="container">-->
    <img class="home_img" src="{{ asset('siteimgs/concert.jpg') }}" alt="">
    <section class="main-content">
        <img class="home_img" src="concert.jpg" alt="">
        <div class="row">
            <div class="span12">													
                <h4 class="title">
                    <span class="pull-left"><span class="text"><span class="line">Eventi <strong>Imminenti</strong></span></span></span>
                    <span class="pull-right">
                        <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                    </span>
                </h4>
                @isset($nearEvents)
                <?php //$nearEvents->toArray(); ?>
                <div id="myCarousel" class="myCarousel carousel slide">
                    <div class="carousel-inner">
                        <div class="active item">
                            <ul class="thumbnails">	
                                @for ($i=0;$i<4;$i++)
                                @if (@isset($nearEvents[$i]))
                                <li class="span3">
                                    <div class="product-box">
                                        <span class="sale_tag"></span>
                                        <p><a href="{{route('event',[$nearEvents[$i]->id])}}"><img src="{{ asset('locandine/'.$nearEvents[i]->immagine)}}" alt="" /></a></p>
                                        <a href="{{route('event',[$nearEvents[$i]->id])}}" class="title">{{$nearEvents[$i]->nome}}</a><br/>
                                    </div>
                                </li>
                                @endif
                                @endfor
                        </div>
                        <div class="item">
                            <ul class="thumbnails">
                                @for ($i=4;$i<8;$i++)
                                @if (@isset($nearEvents[$i]))
                                <li class="span3">
                                    <div class="product-box">
                                        <p><a href="{{route('event',[$nearEvents[$i]->id])}}"><img src="{{ asset('locandine/'.$nearEvents[i]->immagine)}}" alt="" /></a></p>
                                        <a href="{{route('event',[$nearEvents[$i]->id])}}" class="title">{{$nearEvents[$i]->nome}}</a><br/>
                                    </div>
                                </li>
                                @endif
                                @endfor
                        </div>						
                    </div>
                    <br/>	
                </div>				
            </div>
        </div>
        @endisset
        <button class="button" onclick="location.href = '{{route('list')}}'" type="button" > <b>VAI ALLA LISTA COMPLETA DEGLI EVENTI</b></button>
    </section>
<!--</div>-->
@endsection 