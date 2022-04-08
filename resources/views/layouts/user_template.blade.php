<!DOCTYPE html>
<html lang="en">
<head>
<title>The Cheapest | Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">



</head>
<body>
    
   
@yield('content')

<footer class="footer">
<div class="container">
<div class="row">

<div class="col-lg-12 footer_col">
<div class="footer_column footer_contact">
<div class="logo_container">
	<div class="logo"><a href="#">The Cheapest</a></div>
</div>
<div class="footer_title">Got Question? Call Us 24/7</div>
<div class="footer_phone">+961 81 936 432</div>
<div class="footer_social">
	<ul>
		<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
		<li><a href="#"><i class="fab fa-twitter"></i></a></li>
		<li><a href="#"><i class="fab fa-youtube"></i></a></li>
		<li><a href="#"><i class="fab fa-google"></i></a></li>
		<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
	</ul>
</div>
</div>
</div>
</div>
</div>
</footer>
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.j')}}s"></script>
<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>

<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
       
<script>
@if(Session::has('message'))
var type="{{Session::get('alert-type','info')}}"
switch(type){
   case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
   case 'success':
       toastr.success("{{ Session::get('message') }}");
       break;
   case 'warning':
      toastr.warning("{{ Session::get('message') }}");
       break;
   case 'error':
       toastr.error("{{ Session::get('message') }}");
       break;
}
@endif
</script>  
</body>