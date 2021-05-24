@extends('layouts.public')

<h3>
    Informazioni organizzazione
</h3>

<div class="raw">
    <p>Nome organizzazione: {{$user->organizzazione}} <p>
    <p>Email di riferimento: {{$user->email}}<p>
    <p>Password: {{$user->password}} <p>
        <button class="button" onclick="location.href = '{{route('newevent')}}'" type="button" > <b>CREA UN NUOVO EVENTO</b></button>
    <hr size="3" color="black" style="heinght:0.5px">
    <h4><span>Eventi imminenti</span></h4>


    @for($i=0;$i<2;$i++)
    @if(@isset($nearEvents[$i])
    <section class="single_product">
        <div class="product_container clickable"; onclick="location.href ='{{route('event',[$event->id])}}'">
            <!--<div class="image_item"><img src="concert.jpg" alt="Immagine dell'evento" class="product_image"></div>-->
            <div class="image_item"> <img src="{{asset('locandine/'.$nearEvents[$i]->immagine)}}" class="product_image"></div>
            <div class="descr_container">
                <div class="title_item"><h4>{{$event->nome}}
                    </h4></div>
                <div class="info-container">
                    <div>LUOGO: {{route('event',[$nearEvents[$i]->regione])}}</div>
                    <div>DATA: {{route('event',[$nearEvents[$i]->data])}}</div>
                    <div>BIGLIETTI VENDUTI: {{route('event', [$nearEvents]) </div>
                    <div>INCASSO: </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endfor




                /* 
                * To change this license header, choose License Headers in Project Properties.
                * To change this template file, choose Tools | Templates
                * and open the template in the editor.
                */

