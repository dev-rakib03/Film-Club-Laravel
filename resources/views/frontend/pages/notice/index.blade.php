@extends('frontend.layouts.app')
@section('title','Latest News')
@section('css')
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
                        </div>
                    </div>
                    <!-- Section Titel -->
                </div>
                <!-- Service Single Item Area Start -->
                <!-- Latest News Item Area Start -->
                <div class="main-section">
                    <div class="row">
                        @foreach ($latest_news as $news )
                            <!-- News Single -->
                            <div class="col-md-3">
                                <div class="recent-news-single">
                                    <div class="news-thumbnail">
                                        <a href="{{route('notice.view',$news->slag)}}"><img src="{{asset('/').$news->image}}" alt=""></a>
                                    </div>
                                    <div class="news-content text-center">
                                        <h4><a href="{{route('notice.view',$news->slag)}}">{{strlen($news->title)<23?$news->title:substr($news->title, 0, 23)."..."}}</a></h4>
                                        <p>{{strlen($news->body)<45?$news->body:substr($news->body, 0, 45)."..."}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- News Single -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest News Area End -->
    @endif
@endsection
@section('script')
@endsection
