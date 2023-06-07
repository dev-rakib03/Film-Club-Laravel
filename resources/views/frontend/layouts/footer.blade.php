
@php
use App\Models\social;
use App\Models\pageelements;
$socials_footer=social::all();
$about_footer=pageelements::where('row_type','about_footer')->first();
$contact_footer=pageelements::where('row_type','contact_footer')->first();
@endphp
<!-- Footer Area Start -->
<footer class="bg-5 bg-overlay-2">
    <!-- Footer Top Area Start -->
    <div class="footer-top ptb-90">
        <div class="container">
            <div class="row">

                <!-- Footer Single Item -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-single">
                        <h5>STAY WITH US</h5>
                        <div class="stay-with-content">
                            <p style="text-align: justify;">{{json_decode($about_footer->link_or_text)->body}}</p>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->

                <!-- Footer Single Item -->
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-single">
                        <h5>SERVICES</h5>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Hire Studio</a></li>
                                <li><a href="#">Outdoor Spot</a></li>
                                <li><a href="#">Flexible Space</a></li>
                                <li><a href="#">Production House Rent</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <!-- Footer Single Item -->

                <!-- Footer Single Item -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-single">
                        <h5>IMPORTANT LINK</h5>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('gallery')}}">Gallery</a></li>
                                <li><a href="https://film.aiubfilmclub.com/">Our Films</a></li>
                                <li><a href="{{route('afcian')}}">AFCian</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->

                <!-- Footer Single Item -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-single">
                        <h5>QUICK CONTACT</h5>
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <p>Address: {{json_decode($contact_footer->link_or_text)->address}}</p>
                                </li>
                                <br>
                                <li>
                                    <p>Phone: {{json_decode($contact_footer->link_or_text)->phone}}</p>
                                </li>
                                <br>
                                <li>
                                    <p>E-mail: {{json_decode($contact_footer->link_or_text)->email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->

            </div>
        </div>
    </div>
    <!-- Footer Top Area End -->
    <!-- Footer Bottom Area Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p>Copyright © 2009{{--date("Y")--}} AIUB FILM CLUB. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right-social f-right">
                        <ul>
                            @foreach ($socials_footer as $social)
                                @if ($social->name=="Facebook" && $social->link!=null)
                                    <li><a href="{{$social->link}}" target="_blank"><i class="icofont icofont-facebook"></i></a></li>
                                @endif
                                @if ($social->name=="Instagram" && $social->link!=null)
                                    <li><a href="{{$social->link}}" target="_blank"><i class="icofont icofont-instagram"></i></a></li>
                                @endif
                                @if ($social->name=="Youtube" && $social->link!=null)
                                    <li><a href="{{$social->link}}" target="_blank"><i class="icofont icofont-youtube"></i></a></li>
                                @endif
                                @if ($social->name=="Twitter" && $social->link!=null)
                                    <li><a href="{{$social->link}}" target="_blank"><i class="icofont icofont-twitter"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom Area End -->
</footer>
<!-- Footer Area End -->
