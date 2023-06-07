@extends('frontend.layouts.app')
@section('title','Latest Movies')
@section('css')
<style>
    .breadcamb-area {
        padding-bottom: 100px!important;
        padding-top: 150px!important;
    }
    h1, h2, h3, h4, h5, h6, p {
        color: #fff!important;
    }
</style>
@endsection
@section('header-content')
    <!-- Header Menu Area Start -->
    <!-- Breadcamb Area Start -->
    <section class="breadcamb-area bg-17 bg-overlay-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcamb-content text-center text-white text-uppercase">
                        <h1>LATEST MOVIES</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>LATEST MOVIES</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')
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
                    </div>
                </div>
                <!-- Section Titel -->
            </div>
            <!-- Recent Upload Item Area Start -->
            <div class="main-section">
                <div class="row">

                    @foreach ($latest_film as $film)
                        <!-- Single Item -->
                        <div class="latestmovie-single col-md-3" style="margin-bottom:20px;">
                            <div class="latestmovie-image">
                                <div class="latestmovie-img-single">
                                    <img src="{{asset('/').$film->image}}" alt="">
                                </div>
                                <a class="popup-youtube" href="{{$film->video_link}}"><img src="{{asset('/')}}frontend/img/home-pro/play-arrow.png" alt="" /></a>
                            </div>
                            <div class="latestmovie-meta text-center">
                                <h5><a href="{{$film->video_link}}">{{$film->name}}</a></h5>
                                <h6>{{$film->type}} - {{date("d M,Y",strtotime($film->relese_date))}}</h6>
                            </div>
                        </div>
                        <!-- Single Item -->
                    @endforeach


                </div>
            </div>
            <!-- Recent Upload Item Area End -->
        </div>
    </section>
    <!-- Upcomung Movies Area End -->
    @endif
@endsection
@section('script')
@endsection
