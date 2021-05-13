@section ('content')
<img class="home_img" src="{{ asset('img/concerto.jpg') }}" alt="">
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
            <div id="myCarousel" class="myCarousel carousel slide">
                <div class="carousel-inner">
                    <div class="active item">
                        <ul class="thumbnails">												
                            <li class="span3">
                                <!<!-- QUA UN FOR EACH PER OGNI PRODOTTO RECENTE -->
                                <div class="product-box">
                                    <span class="sale_tag"></span>
                                    <p><a href="product_detail.html"><img src="themes/images/ladies/1.jpg" alt="" /></a></p>
                                    <a href="product_detail.html" class="title">Nome evento</a><br/>
                                </div>
                            </li>
                    </div>
                    <div class="item">
                        <ul class="thumbnails">
                            <li class="span3">
                                <div class="product-box">
                                    <p><a href="product_detail.html"><img src="themes/images/ladies/5.jpg" alt="" /></a></p>
                                   <a href="product_detail.html" class="title">Nome evento</a><br/>
                                </div>
                            </li>
                    </div>						
                </div>
                <br/>	
            </div>				
        </div>
    </div>
    <button class="button" onclick="location.href = '#'" type="button" > <b>VAI ALLA LISTA COMPLETA DEGLI EVENTI</b></button>
</section>