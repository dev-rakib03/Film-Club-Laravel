<!-- Header Area Start -->
<header>
    <!-- Header Menu Area Start -->
    <div class="header-menu header header-style-2 mt-40" id="sticky-header">
        <div class="container-fluid pl-135 pr-150">
            <div class="row">
                <!-- Menu Area Start -->
                <div class="col d-lg-block d-md-none d-sm-none d-none">
                    <div class="main-menu text-right">
                        <nav>
                            <ul>
                                <li class="{{Route::is('home')?'active':''}}"><a href="{{asset('/')}}">Home</a></li>
                                <li class="{{Route::is('about')?'active':''}}"><a href="{{route('about')}}">About</a></li>
                                <li class="{{Route::is('gallery')?'active':''}}"><a href="{{route('gallery')}}">Gallery</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Logo Area Start -->
                <div class="col col-md-auto">
                    <div class="logo-img">
                        <a href="{{asset('/')}}"><img src="{{asset('/backend/assets/img/logo.png')}}" alt="" style="width:auto; height:38px; object-fit:contain;"></a>
                    </div>
                </div>
                <!-- Logo Area End -->
                <div class="col align-self-center d-lg-block d-md-block d-sm-none d-none">
                    <div class="main-menu text-left">
                        <nav>
                            <ul>
                                <li><a href="https://www.youtube.com/@AIUBFILMCLUB">Our Films</a></li>
                                <li class="{{Route::is('afcian')?'active':''}}"><a href="{{route('afcian')}}">AFCian</a></li>
                                <li class="{{Route::is('contact')?'active':''}}"><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOBILE-MENU-AREA START -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="mobile-area">
                            <div class="mobile-menu">
                                <nav id="mobile-nav">
                                    <ul style="height:auto!important;">
                                        <li class="{{Route::is('home')?'active':''}}"><a href="{{asset('/')}}">Home</a></li>
                                        <li class="{{Route::is('about')?'active':''}}"><a href="{{route('about')}}">About</a></li>
                                        <li class="{{Route::is('gallery')?'active':''}}"><a href="{{route('gallery')}}">Gallery</a></li>
                                        <li><a href="https://film.aiubfilmclub.com/">Our Films</a></li>
                                        <li class="{{Route::is('afcian')?'active':''}}"><a href="{{route('afcian')}}">AFCian </a></li>
                                        <li class="{{Route::is('contact')?'active':''}}"><a href="{{route('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MOBILE-MENU-AREA END  -->
    </div>
    <!-- Header Menu Area Start -->
    @yield('header-content')
</header>
<!-- Header Area End -->
