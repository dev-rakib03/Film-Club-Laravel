@extends('frontend.layouts.app')
@section('title','About Us')
@section('css')
<style>
    .breadcamb-area {
        padding-bottom: 100px!important;
        padding-top: 150px!important;
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
                        <h1>ABOUT US</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>ABOUT US</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')
<!-- Page Content Start -->
<div class="page-content">

    @foreach ($about_us as $abouts)
        @php
            $about=json_decode($abouts->link_or_text);
        @endphp
        @if ($loop->odd)
            <!-- About Us Area Start -->
            <section class="about-area pt-100">
                <div class="container">
                    <div class="row">
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="section-titel-contact text-left">
                                <h3>{{$about->title}}</h3>
                                <p style="text-align: justify;">{{$about->body}}</p>
                            </div>
                        </div>
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div>
                                <img src="{{asset('/').$about->image}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us End -->
        @else
            <!-- About Us Area Start -->
            <section class="about-area pt-100">
                <div class="container">
                    <div class="row">
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div>
                                <img src="{{asset('/').$about->image}}" alt="">
                            </div>
                        </div>
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="section-titel-contact text-left">
                                <h3>{{$about->title}}</h3>
                                <p  style="text-align: justify;">{{$about->body}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us End -->
        @endif
    @endforeach
    <br>

    <!-- Project Area Start -->
    <section class="project-area pt-90 pb-95 bg-2">
        <div class="container">
            <div class="row">
            @php
                $project=json_decode($projects->link_or_text);
            @endphp
                <!-- Project Single -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="project-single text-center">
                        <div class="project-count text-uppercase">
                            <span class="counter">{{$project->awards}}</span>
                            <h3>Awards</h3>
                        </div>
                    </div>
                </div>
                <!-- Project Single -->
                <!-- Project Single -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="project-single text-center">
                        <div class="project-count text-uppercase">
                            <span class="counter">{{date('Y')-2009}}</span>
                            <h3>Years</h3>
                        </div>
                    </div>
                </div>
                <!-- Project Single -->
                <!-- Project Single -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="project-single text-center">
                        <div class="project-count text-uppercase">
                            <span class="counter">{{$project->complete_works}}</span>
                            <h3>Complete Work</h3>
                        </div>
                    </div>
                </div>
                <!-- Project Single -->
                <!-- Project Single -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="project-single text-center">
                        <div class="project-count text-uppercase">
                            <span class="counter">{{$total_members}}</span>
                            <h3>Total Members</h3>
                        </div>
                    </div>
                </div>
                <!-- Project Single -->
            </div>
        </div>
    </section>
    <!-- Project Area End -->


    <!-- Our Team Area Start -->
    <section class="ourteam-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <!-- Section Titel -->
                <div class="col-md-12">
                    <div class="section-titel text-left two">
                        <h2>OUR EXECUTIVE PANEL</h2>
                        <p style="text-align: justify;">This persons are leading the AIUB FILM CLUB.</p>
                    </div>
                </div>
                <!-- Section Titel -->
            </div>
            <!-- Service Main Area Start -->
            <div class="team-area-main">
                <div class="row overflow-hidden">
                    <div class="col-md-12 position-relative">
                        <div class="slider slider-for">

                            @foreach ($executives as $ex)
                                @php
                                    $executive=json_decode($ex->link_or_text);
                                @endphp
                                <!-- Service Slider Single -->
                                <div class="single-item">
                                    <div class="large-img">
                                        <img src="{{asset('/').$executive->image}}" alt="">
                                    </div>
                                    <div class="thumb-content text-right" style="margin-top:20px;">
                                        <div class="thumb-personal-info">
                                            <div class="teamper-titel">
                                                <h5>{{$executive->name}}</h5>
                                                <span>{{$executive->title}}<br>Email: {{$executive->email}}</span>
                                                <br>
                                                <br>
                                            </div>
                                            <p style="text-align: justify;"><i class="fa fa-quote-left"></i> {{$executive->spech}} <i class="fa fa-quote-right"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Service Slider Single -->
                            @endforeach

                        </div>
                        
                        <style>
                            @media only screen and (max-width: 767px){
                                .team-area-main .slider-nav, .home-two .team-area-main .slider-nav .slider-nav {
                                    display: block!important;
                                    position: relative;
                                    top:0;
                                    left:0;
                                }
                                .thumb-single {
                                    width: 200px!important;
                                }
                                .team-area-main .slick-prev.slick-arrow,.team-area-main .slick-next.slick-arrow{
                                    left:32%!important;
                                    bottom: 5px;
                                }
                                .team-area-main .slider.slider-nav.slick-initialized.slick-slider {
                                    padding-bottom: 40px;
                                }
                            }
                            
                        </style>
                        <!-- Service Thumb Area Start -->
                        <div class="slider slider-nav">

                            @foreach ($executives as $ex)
                                @php
                                    $executive=json_decode($ex->link_or_text);
                                @endphp
                                <div class="thumb-single">
                                    <img src="{{asset('/').$executive->image}}" style="padding: 5px;" alt="">
                                </div>
                            @endforeach
                            
                        </div>
                        <!-- Service Thumb Area Start -->
                    </div>
                </div>
                <!-- Service Main Area End -->
            </div>
        </div>
    </section>
    <!-- Our Team Area End -->
</div>
<!-- Page Content End -->
@endsection
@section('script')
@endsection
