<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('frontend.layouts.metatag')
    <!-- Page Title -->
    <title>
        @hasSection('title')
            @yield('title') - {{env('APP_NAME')}}
        @else
            {{env('APP_NAME')}}
        @endif
    </title>
    @include('frontend.layouts.head')
</head>

<body>

{{-- <!--  PRELOADER  -->
<div class="loader1">
    <div id="loading-area"></div>
</div>

<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a> --}}
<!-- Page Wraper Here Start -->

<div class="page-wraper home-production" id="main-home">
@include('frontend.layouts.nav')

@yield('content')

@include('frontend.layouts.footer')
</div>
@include('frontend.layouts.script')

</body>
</html>
