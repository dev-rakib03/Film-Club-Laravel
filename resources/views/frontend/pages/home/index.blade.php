@extends('frontend.layouts.app')
@section('title','')
@section('css')
<style>
    .see-all{
        color: #fff;
        float: right;
        position:relative;
        right: 0px;
        top:-5px;
    }
    .slider-area .owl-theme .owl-nav.disabled + .owl-dots::after {
        background: rgb(0,0,0,0)!important;
    }
    @media only screen and (max-width: 767px) {
        .see-all{
            margin-bottom: 70px;
            right: 0px;
        }
    }
    @media only screen and (max-width: 480px) {
        .see-all{
            margin-bottom: 50px;
            right: 0px;
        }
    }
</style>
@endsection
@section('header-content')
    @if (!$sliders->isEmpty())
        <!-- Slider Area Start -->
        <div class="slider-area actor production">
            <div class="owl-carousel owl-theme" id="intro">
                @foreach ($sliders as $slider)
                    <!-- Slider Single -->
                    <!--<div class="slider-item js-ripples" style="background-color:black;  background-image: url({{asset($slider->image)}});width:100%;">-->
                    <div class="slider-item" style="background-color:black;  background-image: url({{asset($slider->image)}});width:100%;">
                        <div class="slider-item " style="background-color:rgb(0,0,0,.7);">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="slide-content m-0 text-center col-lg-12 col-md-12 col-sm-12">
                                    @php
                                        $title = explode(" ", $slider->text);
                                        $first_title ="";
                                        $last_title ="";
                                        for ($i=0; $i <ceil(count($title)/2) ; $i++) {
                                            $first_title = $first_title." ".$title[$i];
                                        }
                                        for ($i=ceil(count($title)/2); $i <count($title) ; $i++) {
                                            $last_title = $last_title." ".$title[$i];
                                        }
                                    @endphp
                                    <h2> <span>{{$first_title}}</span> {{$last_title}}</h2>
                                    @if ($slider->btn_text && $slider->btn_link)
                                        <div class="col align-self-center d-lg-block d-md-block d-sm-block d-block">
                                            <div class="pro-mre-btn text-center">
                                                <a href="{{$slider->btn_link}}">{{$slider->btn_text}}</a>
                                            </div>
                                        </div>
                                    @endif
                                    <ul class="slider-social-production">
                                        @foreach ($socials as $social)
                                            @if ($social->name=="Facebook" && $social->link!=null)
                                                <li><a href="{{$social->link}}" target="_blank">FACEBOOK</a></li>
                                            @endif
                                            @if ($social->name=="Instagram" && $social->link!=null)
                                                <li><a href="{{$social->link}}" target="_blank">INSTAGRAM</a></li>
                                            @endif
                                            @if ($social->name=="Youtube" && $social->link!=null)
                                                <li><a href="{{$social->link}}}}" target="_blank">YOUTUBE</a></li>
                                            @endif
                                            @if ($social->name=="Twitter" && $social->link!=null)
                                                <li><a href="{{$social->link}}" target="_blank">TWITTER</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($slider->play_btn_link)
                                        <div class="pro-slide-pop">
                                            <a href="{{$slider->play_btn_link}}" class="popup-youtube" tabindex="0"><img src="{{asset('/frontend/img/home-video/play-arrow.png')}}" alt="">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Slider Single -->
                @endforeach
            </div>
        </div>
        <!-- Slider Area End -->
        
    @endif
@endsection


@section('content')
<!-- Page Content Start -->
<div class="page-content production-black">


    @if (!$about_us->isEmpty())
        @foreach ($about_us as $about)
            <!-- About Us Area Start -->
            <section class="aboutus-area-actor black-dark-bg ptb-90">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="about-actor-left">
                                @php
                                    $about_details=json_decode($about->link_or_text);
                                    $title = explode(" ", $about_details->title);
                                    $first_title ="";
                                    $last_title ="";
                                    for ($i=0; $i <ceil(count($title)/2) ; $i++) {
                                        $first_title = $first_title." ".$title[$i];
                                    }
                                    for ($i=ceil(count($title)/2); $i <count($title) ; $i++) {
                                        $last_title = $last_title." ".$title[$i];
                                    }
                                @endphp
                                <h3>{{$first_title}} <span>{{$last_title}}</span></h3>
                                <div class="text mt-20">
                                    <p  style="text-align: justify;">{{$about_details->body}}</p>
                                </div>
                                <div class="button-rectangle pt-25">
                                    <a href="{{route('about')}}">About More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="actor-about-image text-center">
                                <img src="{{asset('/').$about_details->image}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us Area End -->
            @break
        @endforeach
    @endif


    @if (!$latest_film->isEmpty())
        <!-- Upcoming Movies Area Strat -->
        <section class="tailer-area black-light-bg pt-90 pb-100 indicator-style-two">
            <div class="container">
                <div class="row">
                    <!-- Section Titel -->
                    <div class="col-md-12">
                        <div class="section-titel style-3 text-left">
                            <h2>OUR LATEST <span>FILMS</span></h2>
                            <p>Here is the films list of our production, enjoy the films and stay with us. </p>
                            <a class="see-all" href="{{route('latest.movies')}}">See All</a>
                        </div>
                    </div>
                    <!-- Section Titel -->
                </div>
                <!-- Recent Upload Item Area Start -->
                <div class="main-section">
                    <div class="recent-upload-active owl-carousel owl-theme">

                        @foreach ($latest_film as $film)
                            @if ($loop->index<10)
                                <!-- Single Item -->
                                <div class="latestmovie-single">
                                    <div class="latestmovie-image">
                                        <div class="latestmovie-img-single">
                                            <img src="{{asset('/').$film->image}}" alt="">
                                        </div>
                                        <a class="popup-youtube" href="{{$film->video_link}}"><img src="{{asset('/')}}frontend/img/home-pro/play-arrow.png" alt="" /></a>
                                    </div>
                                    <div class="latestmovie-meta text-center">
                                        <h5 style="overflow-y: hidden; height: 22px; line-height: 22px;"><a href="{{$film->video_link}}">{{$film->name}}</a></h5>
                                        <h6>{{$film->type}} - {{date("d M,Y",strtotime($film->relese_date))}}</h6>
                                    </div>
                                </div>
                                <!-- Single Item -->
                            @else
                                @break
                            @endif
                        @endforeach


                    </div>
                </div>
                <!-- Recent Upload Item Area End -->
            </div>
        </section>
        <!-- Upcomung Movies Area End -->
    @endif


    @if (!$latest_news->isEmpty())
        <!-- Latest News Area Start -->
        <section class="pro-latest-news-area black-dark-bg pt-90 pb-60 indicator-style-two">
            <div class="container">
                <div class="row">
                    <!-- Section Titel -->
                    <div class="col-md-12">
                        <div class="section-titel style-3 text-left">
                            <h2>AFC LATEST  <span>NEWS</span></h2>
                            <p>Here is the latest update of our club. </p>
                            <a class="see-all" href="{{route('notice')}}">See All</a>
                        </div>
                    </div>
                    <!-- Section Titel -->
                </div>
                <!-- Service Single Item Area Start -->
                <!-- Latest News Item Area Start -->
                <div class="main-section">
                    <div class="pro-latest-news-active owl-carousel owl-theme">

                        @foreach ($latest_news as $news )
                            @if ($loop->index<10)
                                <!-- News Single -->
                                <div class="recent-news-single">
                                    <div class="news-thumbnail">
                                        <a href="{{route('notice.view',$news->slag)}}"><img src="{{asset('/').$news->image}}" alt=""></a>
                                    </div>
                                    <div class="news-content text-center">
                                        <h4><a href="{{route('notice.view',$news->slag)}}">{{strlen($news->title)<23?$news->title:substr($news->title, 0, 23)."..."}}</a></h4>
                                        <p>{{strlen($news->body)<45?$news->body:substr($news->body, 0, 45)."..."}}</p>
                                    </div>
                                </div>
                                <!-- News Single -->
                            @else
                                @break
                            @endif
                        @endforeach



                    </div>
                </div>
            </div>
        </section>
        <!-- Latest News Area End -->
       
    @endif

</div>
<!-- Page Content End -->

@endsection
@section('script')
 <script>
    var owl = $("#intro");
    owl.owlCarousel({
        items:1, //how many items you want to display
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false
    });
</script>
@endsection
