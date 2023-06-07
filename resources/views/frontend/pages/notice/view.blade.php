@extends('frontend.layouts.app')
@section('title','Latest News')
@section('css')
<meta property="og:url"                content="{{ url()->current() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $latest_news->title }}" />
<meta property="og:description"        content='{{ str_replace("\n","<br>",$latest_news->body) }}' />
<meta property="og:image"              content="{{asset('/').$latest_news->image}}" />
<style>
    .breadcamb-area {
        padding-bottom: 100px!important;
        padding-top: 150px!important;
    }
    h1, h2, h3, h4, h5, h6, p {
        color: #fff!important;
    }
    .news-content h4 a {
        color:#fff!important;
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
                        <h1>LATEST NEWS</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>LATEST NEWS</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')

        <!-- Latest News Area Start -->
        <section class="pro-latest-news-area black-dark-bg pt-90 pb-60 indicator-style-two">
            <div class="container">
                <div class="row">
                    <!-- Section Titel -->
                    <div class="col-md-12">
                        <div class="section-titel style-3 text-left">
                            <h2>{{$latest_news->title}}</h2>
                        </div>
                    </div>
                    <!-- Section Titel -->
                </div>
                <!-- Service Single Item Area Start -->
                <!-- Latest News Item Area Start -->
                <div class="main-section">
                        <div class="">
                            <center>
                               <div class="news-thumbnail">
                                    <img src="{{asset('/').$latest_news->image}}" alt="" style="max-height: 300px;">
                                </div> 
                            </center>
                            
                            <div>
                                <p style="text-align: justify;">
                                <?php 
                                    echo str_replace("\n","<br>",$latest_news->body);
                                ?>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <!-- Latest News Area End -->

@endsection
@section('script')
@endsection
