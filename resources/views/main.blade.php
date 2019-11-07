<!DOCTYPE html>
<html lang="zxx">
<head>
<title>{{config('app.name')}}</title>
	<meta charset="UTF-8">
	<meta name="description" content="ProDent dentist template">
	<meta name="keywords" content="prodent, dentist, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('img/favicon.ico" rel="shortcut icon')}}"/>

	<!-- Google Font -->   
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('js/bootstrap.js')}}"/>
    <link rel="stylesheet" href="{{asset('js/app.js')}}"/>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	<script src="https://kit.fontawesome.com/f7a0334af1.js"></script>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
    
    
   


	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- Site Logo -->
			 
				<img src="{{asset('img/logo.png')}}" alt="{{config('app.name')}}"> {{config('app.name')}}
			 
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- Main Menu -->
			<ul class="main-menu">
				<li class="active"><a href="index">Home</a></li>
				 
			 
				<li><a href="appointment">Appointment</a></li>
				<li><a href="contactus">Contact Us</a></li>
		 
				@if(!auth::check())
				<li><a href="login" >Login </a></li>

				@else

				<li><a href="dashboard">Dashboard</a> </li>
				<li><a href="logout">LogOut</a> </li>
				

			 
				@endif

			</ul>
        </div>
        





@include('noti')



	<!-- Banner section >
	<section class="banner-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 banner-text text-white">
						<h4>Schedule your appointment for a free consultation.</h4>
						<p>*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus.</p>
					</div>
					<div class="col-lg-5 text-lg-right">
						<a href="#" class="site-btn sb-light">Read More</a>
					</div>
				</div>
			</div>
		</section-->




		<div class="header-info">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 hi-item">
						<div class="hs-icon">
							<img src="{{asset('img/icons/map-marker.png')}}" alt="">
						</div>
						<div class="hi-content">
						<h6>Location:</h6>
							<p>{{$location->implode('set_code')}}</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 hi-item">
						<div class="hs-icon">
							<img src="{{asset('img/icons/clock.png')}}" alt="">
						</div>
						<div class="hi-content">
							<h6>Opening Hours:</h6>
							<p>{{$open_hours->implode('set_code')}}</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 hi-item">
						<div class="hs-icon">
							<img src="{{asset('img/icons/phone.png')}}" alt="">
						</div>
						<div class="hi-content">
							<h6>Mobile:</h6>
							<p>{{$mobile->implode('set_code')}}</p>
						</div>
					</div>
				 
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->



    @yield('content')



	</section>
	<!-- Footer top section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			 
			<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="mailto:m.alhumada@gmail.com" target="_blank">Eng: Mohamed Ali Alhumada (+961 81825056)</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
		</div>
	</footer>
	<!-- Footer top section end -->
                                                

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

    </body>
</html>