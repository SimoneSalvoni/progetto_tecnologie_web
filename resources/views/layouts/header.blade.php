<section id="header">
    <div id="top-bar" class="container">
        <div class="row_header" >
<<<<<<< HEAD
            <img src="{{ asset('siteimgs/logo.png') }}" class="site_logo" alt="" href="{{route('home')}}">
=======
            <a href='{{route('home')}}' style='height:inherit'><img src="{{ asset('siteimgs/logo.png') }}" alt=""></a>
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
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

