<!-- all js here -->
<script src="{{asset('/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/frontend/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('/frontend/js/popper.js')}}"></script>
<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('/frontend/js/plugins.js')}}"></script>
<script src="{{asset('/frontend/js/main.js')}}"></script>

<!-- Revolution Slider JS -->
<script src="{{asset('/frontend/assets/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('/frontend/assets/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('/frontend/assets/revolution/revolution-active.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

<script type="text/javascript">
    
    console.log("Developed by:");
    console.log("Name: Md Rakibuzzman");
    console.log("AIUB ID: 19-40124-1");
    console.log("Email: rakibuzzman71@gmail.com");
    
</script>

@yield('script')
