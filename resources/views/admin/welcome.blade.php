<!DOCTYPE HTML>
<!--
	Justice by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aktis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400, 900" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/themify-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/bootstrap.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/magnific-popup.css')}}">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/owl.theme.default.min.css')}}">
	<!-- Flexslider -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/flexslider.css')}}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('adminTemplate/welcome/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('adminTemplate/welcome/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"><a target="_new" href="https://aktis.com.ar">Aktis</a></div>
				</div>
			</div>
			
		</div>
	</nav>

	<section id="gtco-hero" class="gtco-cover" style="background-image: url({{asset('adminTemplate/welcome/images/img_bg_5.jpg')}});"  data-section="home"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeIn">El lugar más seguro para gestionar tus activos!</h1>
							<a class="btn btn-primary" href="{{route('usuario.login.view')}}">Ingresar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jQuery -->
	<script src="{{asset('adminTemplate/welcome/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('adminTemplate/welcome/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('adminTemplate/welcome/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('adminTemplate/welcome/js/jquery.waypoints.min.js')}}"></script>
	<!-- Stellar -->
	<script src="{{asset('adminTemplate/welcome/js/jquery.stellar.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('adminTemplate/welcome/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('adminTemplate/welcome/js/magnific-popup-options.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('adminTemplate/welcome/js/main.js')}}"></script>

	</body>
</html>