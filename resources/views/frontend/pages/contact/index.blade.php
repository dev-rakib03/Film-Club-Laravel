@extends('frontend.layouts.app')
@section('title','Contact Us')
@section('css')
<style>
    .breadcamb-area {
        padding-bottom: 100px!important;
        padding-top: 150px!important;
    }
    .contact{
		padding: 4%;
		height: 400px;
	}
	.col-md-3{
		background: #e2a750;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: black;
		color: #fff;
		font-weight: 600;
		width: 100%;
		margin:5px;
	}
	.contact-form button:focus{
		box-shadow:none;
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
                        <h1>CONTACT US</h1>
                        {{-- <ul>
                            <li><a href="index.html">HOME <span>/</span></a></li>
                            <li>CONTACT US</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')
<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Contact Us</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-9">
		    @if(session()->exists('success'))
		    <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
            @endif
		    <form action="{{route('contact.submit')}}" method="post" enctype="multipart/form-data" >
		        @csrf
		        <div class="contact-form">
    				<div class="form-group">
    				  <label class="control-label col-sm-2" for="name">Name:</label>
    				  <div class="col-sm-10">          
    					<input type="text" required class="form-control" id="name" placeholder="Enter Name" name="name">
    				  </div>
    				</div>
    				<div class="form-group">
    				  <label class="control-label col-sm-2" for="email">Email:</label>
    				  <div class="col-sm-10">
    					<input type="email" required class="form-control" id="email" placeholder="Enter email" name="email">
    				  </div>
    				</div>
    				<div class="form-group">
    				  <label class="control-label col-sm-2" for="comment">Comment:</label>
    				  <div class="col-sm-10">
    					<textarea class="form-control" required rows="5" id="comment" name="comment"></textarea>
    				  </div>
    				</div>
    				<div class="form-group">        
    				  <div class="col-sm-offset-2 col-sm-10">
    					<button type="submit" class="btn btn-default">Submit</button>
    				  </div>
    				</div>
    			</div>
		    </form>
    			
			
			
		</div>
	</div>
</div>


<!-- Page Content Start -->
<div class="page-content" style="margin-top:210px;">
    <section class="contact-us-area pt-90 pb-100">
        <div class="container">
            <div class="row">
                <!-- Section Title -->
                <div class="col-lg-6 col-md-12">
                    <div class="section-titel-contact text-left">
                        <h3>QUICK CONTACT</h3>
                        {{-- <p>It is a long established fact that a reader will be distracted by the on readable content of a page when looking at its layout. The point of using Lorem Ipsum is that logic.</p> --}}
                    </div>
                </div>
                <!-- Section Title -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-us-map">

                        <!-- Google Map Area Start -->
                        <div class="google-map-area w-100">
                            <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.9007218550605!2d90.42521761541562!3d23.822129091948312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c711d13bbec7%3A0xc47f7c3e8e2263f2!2z4KaG4Kau4KeH4Kaw4Ka_4KaV4Ka-4KaoIOCmh-CmqOCnjeCmn-CmvuCmsOCmqOCnjeCmr-CmvuCmtuCmqOCmvuCmsiDgpofgpongpqjgpr_gpq3gpr7gprDgp43gprjgpr_gpp_gpr8t4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2ICjgpo_gpobgpofgpofgpongpqzgpr8p!5e0!3m2!1sbn!2sbd!4v1659110466082!5m2!1sbn!2sbd"></iframe>
                        </div>
                        <!-- Google Map Area Start -->
                        @php
                            $contact=json_decode($contacts->link_or_text);
                        @endphp
                        <div class="contact-address">
                            <div class="contact-adres-single">
                                <h4>ADDRESS</h4>
                                <p>{{$contact->address}}</p>
                            </div>
                            <div class="contact-adres-single">
                                <h4>E-mail</h4>
                                <p>{{$contact->email}}</p>
                            </div>
                            <div class="contact-adres-single">
                                <h4>PHONE</h4>
                                <p>{{$contact->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Page Content End -->
@endsection
@section('script')
@endsection
