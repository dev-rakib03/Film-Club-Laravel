@extends('frontend.layouts.app')
@section('title','Afcian')
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
                        <h1>AFCIAN</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>AFCIAN</li>
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
    <div class="gallery-area pb-100">
        <div class="container">


            <div class="input-group" style="padding-top: 30px;padding-bottom: 30px;">
                <div style="width:85%!important" >
                  <input type="search" id="search_value" name="search" class="form-control" placeholder="AIUB ID"/>
                </div>
                <button type="button" class="btn btn-primary" onclick="window.location ='/afcian?search='+document.getElementById('search_value').value"  style="width:15%!important;height:45px;">
                  <i class="fa fa-search"></i>
                </button>
            </div>

            @if (!$members->isEmpty())
                <div class="gallery-content row">

                    @foreach ($members as $member)
                            <div class="grid-item col-md-3 text-center">
                                <img src="{{asset('/').$member->image}}" style="margin-bottom:10px; object-fit:contain;" alt="">
                                <h3>{{$member->name}}</h3>
                                <span style="color:green;">{{$member->designation}}</span><br>
                                <span>From {{date("M Y",strtotime($member->joining_date))}}</span>
                            </div>
                    @endforeach


                </div>
                <!-- Latest Shot Main Area End -->
                <!-- Load More Button -->

                <div class="load-btn text-center mt-20">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{$members->onFirstPage()?'disabled':''}}">
                        <a class="page-link" href="{{$members->previousPageUrl()}}">Previous</a>
                        </li>
                        @if ($members->currentPage()!=1)
                            <li class="page-item"><a class="page-link" href="{{$members->previousPageUrl()}}">{{$members->currentPage()-1}}</a></li>
                        @endif
                        <li class="page-item active"><a class="page-link" href="#">{{$members->currentPage()}}</a></li>
                        @if (!$members->onLastPage())
                            <li class="page-item"><a class="page-link" href="{{$members->nextPageUrl()}}">{{$members->currentPage()+1}}</a></li>
                        @endif
                        <li class="page-item {{$members->onLastPage()?'disabled':''}}">
                        <a class="page-link" href="{{$members->nextPageUrl()}}">Next</a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="row"></div>
                    <div class="col-md-12 text-center">
                        <h2>No Member Found!</h2>
                    </div>
                </div>
            @endif
            <!-- Load More Button -->
        </div>
    </div>
    <!-- Gallery Area End -->
</div>
<!-- Page Content End -->
@endsection
@section('script')
@endsection
