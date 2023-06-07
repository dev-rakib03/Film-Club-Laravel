@extends('frontend.layouts.app')
@section('title','FIND APPLICATION')
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
                        <h1>FIND APPLICATION</h1>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $error }}</li><br>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('alrady.applied.find')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="aiub_id">AIUB ID *</label>
                                    <input type="text" class="form-control" id="aiub_id" name="aiub_id" placeholder="00-00000-0">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row pt-10">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Find Application">
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                    <div class="row  pt-10 m-0">
                                <a href="{{route('apply.view')}}" class="btn btn-warning" style="color:#fff;">Apply Now!</a>
                    </div>
                    
                </div>
            </section>
        </section>
@endsection
@section('script')

@endsection
