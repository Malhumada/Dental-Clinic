

@extends('main')
@section('content')


                                                
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
		
			@foreach ($slider as $item)
				
			
			<div class="hs-item set-bg text-white" data-setbg="img/dental_banner.jpg" style="width:100%; height:400px;">
				<div class="container">
					<div class="row">
						<div class="col-xl-7">
							<h2>{{$item->set_value}}</h2>
							<p>{{$item->set_code}}</</p>
							 
						</div>
					</div>
				</div>
			</div>
 
		@endforeach

		</div>
	</section>
	<!-- Hero section end -->



	<!-- Services section -->
	<section class="services-section spad">
			<div class="container">
				<div class="section-title text-center">
					<h2>Our Services</h2>
				</div>
				<div class="row">
@foreach ($Services as $item)
	


					<div class="col-lg-4 col-md-6 service">
						<div class="service-icon">
						<img src="{{asset('img/broken-tooth.png')}}">
						</div>
						<div class="service-content">
							<h4>{{$item->set_value}}</h4>
							<p>{{$item->set_code}}</p>
						</div>
					</div>
 @endforeach

					</div>
					 
				</div>
			</div>
		</section>
		<!-- Services section end -->
	
	<!-- Banner section end -->



	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<img src="img/shutterstock_488170936.jpg" alt="">
				</div>
				<div class="col-lg-7 about-text">
					<h2>We Care About Your teeth</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper venenatis turpis eget suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec eu nulla sollicitudin, vestibulum sapien nec, dictum dolor. Morbi non penatibus et magnis  volutpat magna. </p>
					 
				</div>
			</div>
		</div>
	</section>
	<!-- About section end -->

 
	<!-- Facts section end -->



	<!-- Gallery section -->
	<div class="gallery-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-sm-6 p-0">
					<img src="img/gallery/1.jpg" alt="">
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<img src="img/gallery/2.jpg" alt="">
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<img src="img/gallery/3.jpg" alt="">
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<img src="img/gallery/4.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
	<!-- Gallery section end -->


	<!-- Testimonials section -->
	<section class="testimonials-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Testimonials</h2>
			</div>
		</div>
		<div class="testimonials-warp">
			<div class="testimonials-slider owl-carousel">

				@foreach ($Testimo as $item )
					

				<div class="testimonial-item">
					<div class="ts-content">
						<div class="quta">“</div>
					<p>{{$item->set_value}}</p>
					<h6>{{$item->set_code}}</h6>
						<!--span>Pacient</span-->
					</div>
					<div class="author-pic set-bg" data-setbg="img/review/1.jpg"></div>
				</div>

				@endforeach



			</div>
		</div>
	</section>
	<!-- Testimonials section end -->

 


	<!-- Footer top section -->
	 

@endsection