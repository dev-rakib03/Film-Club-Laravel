@extends('frontend.layouts.app')
@section('title','SUCCESS')
@section('css')

@endsection
@section('header-content')
    <!-- Header Menu Area Start -->
    <!-- Breadcamb Area Start -->
    <meta http-equiv="Refresh" content="0; url='{{asset('/')}}download/{{$applicant->id}}'" />
    <section class="breadcamb-area bg-17 bg-overlay-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcamb-content text-center text-white text-uppercase">
                        <h1>SUCCESS</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')
<div style="margin: 20px 0px;">
    <center>
        {{--<h1>Your Application ID: {{$applicant->id}}</h1>--}}
        <h3>You have successfully submitted your application!!</h3>
        <img src="https://whatsupgermany.de/wp-content/uploads/2016/12/5-Film-reel.gif" style="height:250px;"><br>
        <label style="color:red;">Note: Download and print the application. Bring it on the interview date.</label><br>
        <a class="btn btn-info" href="{{route('apply.download',$applicant->id)}}" style="color:#fff;" >Download</a>
    </center>
</div>
    

@endsection
@section('script')

@endsection

