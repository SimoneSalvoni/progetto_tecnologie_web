<section id="header"> 
<div id="top-bar" class="container">     
    <div class="row_header" >            
        <img src="{{ asset('siteimgs/logo.png') }}" class="site_logo" alt="" href="{{route('home')}}">
        <div class="right_header">
            <div class="account pull-right">
                <ul class="user-menu">	
                    <li><a href="#">Accedi</a></li> <!-- href per le rotte: {{ route ('nomeRotta') }} -->
                    <!-- NON PENSO SIA COSI' SEMPLICE VISTO CHE ABBIAMO PIU' LIVELLI DI UTENTE
                    @auth
                    <li><a href="#">Area personale</a></li>
                    <li><a href="#">Logout</a></li>
                    @endauth
                    -->
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="navbar main-menu">
        <div class="navbar-inner main-menu">				
            <nav id="menu" class="pull-left">
                <ul>
                    <li><a href="{{route('home')}}">Home</a>					
                    </li>															
                    <li><a href="{{route('list')}}">Eventi</a></li>			
                </ul>
            </nav>
        </div>
    </div>
</section>

