<section id="header">
    <div id="top-bar" class="container">
        <div class="row_header" >
            <a href='{{route('home')}}' style='height:inherit'><img src="{{ asset('siteimgs/logo.png') }}" alt=""></a>
            <div class="right_header">
                <div class="account pull-right">
                    <ul class="user-menu">
                        @guest
                        <li><a href="{{route('login')}}">Accedi</a></li>
                        @endguest

                        @can('isUser')
                        <li><a href="{{route('areariservata.user')}}">Area utente</a></li>
                        <li><a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                        @endcan
                        @can('isOrg')
                        <li><a href="{{route('areariservata.org')}}">Area organizzatore</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        @endcan
                        @can('isAdmin')
                        <li><a href="{{route('areariservata.admin')}}">Area admin</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        @endcan




                    </ul>
                </div>
            </div>
        </div>
    </div>
   <!-- <div id="wrapper" class="container">-->
        <!--  </div> -->
</section>

