@extends('frontend.layouts.app')
@section('title','Gallery')
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
                        <h1>GALLERY</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>GALLERY</li>
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
    <!-- Gallery Area Start -->
    <div class="gallery-area pt-95 pb-100">
        <div class="container">
            <!-- Latest Shot Main Area Start -->
            <div class="our-gallery">
                {{-- <!-- Latest Shot/Portfolio Menu Tab -->
                <div class="gallery">
                    <ul class="text-center gallery-menu mr-0">
                        <li class="active" data-filter="*">All</li>
                        <li class="filter" data-filter=".c1">SHOOTING</li>
                        <li class="filter" data-filter=".c2">PRODUCTION </li>
                        <li class="filter" data-filter=".c3">STUDIO</li>
                        <li class="filter" data-filter=".c4">LOCATION</li>
                    </ul>
                </div>
                <!-- Latest Shot/Portfolio Menu Tab --> --}}
                <div class="grid gallery-box">
                    <div class="gallery-content row">

                        @foreach ($gallery as $image)
                            <div class="grid-item col-lg-4 col-md-6 col-sm-12">
                                <!-- Latest Shot/Portfolio Single -->
                                <div class="gallery-single">
                                    <div class="gallery-image">
                                        <img src="{{$image->image}}" style="height:250px; object-fit:cover;" alt="">
                                        <a href="{{$image->image}}" class="popup-gallery"><i class="icofont-search"></i></a>
                                    </div>
                                </div>
                                <!-- Latest Shot/Portfolio Single -->
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- Latest Shot Main Area End -->
            <!-- Load More Button -->
            <div class="load-btn text-center mt-20">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{$gallery->onFirstPage()?'disabled':''}}">
                      <a class="page-link" href="{{$gallery->previousPageUrl()}}">Previous</a>
                    </li>
                    @if ($gallery->currentPage()!=1)
                        <li class="page-item"><a class="page-link" href="{{$gallery->previousPageUrl()}}">{{$gallery->currentPage()-1}}</a></li>
                    @endif
                    <li class="page-item active"><a class="page-link" href="#">{{$gallery->currentPage()}}</a></li>
                    @if (!$gallery->onLastPage())
                        <li class="page-item"><a class="page-link" href="{{$gallery->nextPageUrl()}}">{{$gallery->currentPage()+1}}</a></li>
                    @endif
                    <li class="page-item {{$gallery->onLastPage()?'disabled':''}}">
                      <a class="page-link" href="{{$gallery->nextPageUrl()}}">Next</a>
                    </li>
                  </ul>
            </div>
            <!-- Load More Button -->
        </div>
    </div>
    <!-- Gallery Area End -->
</div>
<!-- Page Content End -->
@endsection
@section('script')
@endsection
