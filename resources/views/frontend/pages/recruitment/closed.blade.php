@extends('frontend.layouts.app')
@section('title','MEMBER RECRUITMENT')
@section('css')

@endsection
@section('header-content')
    <!-- Header Menu Area Start -->
    <!-- Breadcamb Area Start -->
    <section class="breadcamb-area bg-17 bg-overlay-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcamb-content text-center text-white text-uppercase">
                        <h1>MEMBER RECRUITMENT</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')

       <div class="page-content">
            <!-- About Us Area Start -->
            <section class="about-area pt-50 pb-50">
                <div class="container">
                    <h3 class="text-center" style="font-family:ariel;">
                        At this moment we are not accepting any application for member recruitment!<br> To get latest update be connected with us.
                    </h3>
                    <label style="color:red;">Note: Download and print the application. Bring it on the interview date.</label><br>
                    <div class="row  pt-10 m-0">
                        <a href="{{route('alrady.applied')}}" class="btn btn-info" style="color:#fff;">Download Your Application</a>
                    </div>
                </div>
                
            </section>
        </section>
@endsection
@section('script')

@endsection
