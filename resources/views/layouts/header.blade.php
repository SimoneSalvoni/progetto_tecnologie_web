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

                        @auth
                        <li><a href="#">Area personale |</a></li>
                        <li><a href="#">Logout</a></li>
                        @endauth


                    </ul>
                </div>
            </div>
        </div>
    </div>
   <!-- <div id="wrapper" class="container">-->
        <!--  </div> -->
</section>

