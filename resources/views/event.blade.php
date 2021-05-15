@extends (layouts.public)

@section ('content')
<section  class="main-content">		<!<!-- style=main.css c'era dentro, perché? -->		
    <div class="row">						
        <div class="span9">
            <a href="themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="themes/images/ladies/1.jpg"></a>												
        </div>
        <div class="single_event">
            <!<!-- PLACEHOLDER TUTTO IL CONTENUTO, BISOGNERA' PRENDERLO DALLE INFO SULL'EVENTO PASSATE... -->
            <h3><span>Nome evento super mega extra lunghissimoooooo</span></h3>
            <h5><strong>Organizzazione:</strong></h5>				
            <h5><strong>Data:</strong></h5>
            <h5><strong>Luogo:</strong></h5>								
            <h5><strong>Prezzo: </strong></h5>
            <form class="form-inline">
                <h5>Bilgietti rimanenti:</h5>
                <button class="btn btn-inverse" type="submit">Acquista</button>
            </form>
            <div class="form-inline">
                <form class="form-inline">
                    <button class="btn btn-inverse" type="submit">Parteciperò</button>
                </form>
            </div>	
        </div>							 
        <div class="span9">	
            <hr>
            <div class="container" style="width: 100%;">
                <p class="desc">
                    DESCRIZIONEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE 
                </p>
                <div>  
                    <iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed"></iframe>  
                </div>
            </div>     
        </div>
    </div>
</section>
@endsection

