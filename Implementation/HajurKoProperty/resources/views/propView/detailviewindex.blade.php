@extends('layouts.app')

@section('mainTitle') Home-Hajurko Property @endsection

@extends('_layouts.customTop')
<style>
	.page-top-section{
		background-image: url("../img/review-bg.jpg");
		background-repeat: no-repeat;
		background-position: cover;
	}
</style>
@section('content')
	<!-- Page top section -->
	<section class="page-top-section set-bg" > 
		<div class="container text-white">
			<h2>Property Details</h2>
		</div>
	</section>

	<section class="page-section mt-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="{{ asset('images/hBanner.jpg') }}" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ asset('images/bannerH.jpg') }}" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ asset('images/log.jpg') }}" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>

					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
							<h2></h2>
								<p><i class="fa fa-map-marker-alt"></i>Beverly Hills, CA 90210</p>
							</div>
							<div class="col-xl-4">
								<a href="#" class="btn btn-success pl-5 pr-5 pt-3 pb-3 font-weight-bold">Book Now</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i> 1500 Square foot</p>
								<p><i class="fa fa-bed"></i> 16 Bedrooms</p>
								<p><i class="fa fa-user"></i> Gina Wesley</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-car"></i> 2 Garages</p>
								<p><i class="fa fa-building-o"></i> Family Villa</p>
								<p><i class="fa fa-clock-o"></i> 1 days ago</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-bath"></i> 8 Bathrooms</p>
								<p><i class="fa fa-trophy"></i> 5 years age</p>
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.</p>
							</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Air conditioning</p>
								<p><i class="fa fa-check-circle-o"></i> Telephone</p>
								<p><i class="fa fa-check-circle-o"></i> Laundry Room</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Central Heating</p>
								<p><i class="fa fa-check-circle-o"></i> Family Villa</p>
								<p><i class="fa fa-check-circle-o"></i> Metro Central</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-check-circle-o"></i> City views</p>
								<p><i class="fa fa-check-circle-o"></i> Internet</p>
								<p><i class="fa fa-check-circle-o"></i> Electric Range</p>
							</div>
						</div>
						<h3 class="sl-sp-title bd-no">Floorplans</h3>
						<div id="accordion" class="plan-accordion">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">First Floor: <span>660 sq ft</span>	<i class="fa fa-angle-down"></i></button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Second Floor:<span>610 sq ft.</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingThree">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Third Floor :<span>580 sq ft</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
						</div>

						<h3 class="sl-sp-title bd-no">Video</h3>
						<div class="perview-video">
							<img src="img/video.jpg" alt="">
							<a href="https://www.youtube.com/watch?v=v13nSVp6m5I" class="video-link"><img src="img/video-btn.png" alt=""></a>
						</div>
						<h3 class="sl-sp-title bd-no">Location</h3>
						<div class="pos-map" id="map-canvas"></div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5>Gina Wesley</h5>
							<p>Real Estate Agent</p>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
							<p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
						</div>
					</div>
					<div class="contact-form-card">
						<h5>Do you have any question?</h5>
						<form>
							<input type="text" placeholder="Your name">
							<input type="text" placeholder="Your email">
							<textarea placeholder="Your question"></textarea>
							<button>SEND</button>
						</form>
					</div>
					<div class="related-properties">
						<h2>Related Property</h2>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
								<div class="sale-notic">FOR SALE</div>
							</div>
							<div class="rp-info">
								<h5>1963 S Crescent Heights Blvd</h5>
								<p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
							</div>
							<a href="#" class="rp-price">$1,200,000</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/2.jpg">
								<div class="rent-notic">FOR Rent</div>
							</div>
							<div class="rp-info">
								<h5>17 Sturges Road, Wokingham</h5>
								<p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
							</div>
							<a href="#" class="rp-price">$2,500/month</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/4.jpg">
								<div class="sale-notic">FOR SALE</div>
							</div>
							<div class="rp-info">
								<h5>28 Quaker Ridge Road, Manhasset</h5>
								<p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
							</div>
							<a href="#" class="rp-price">$5,600,000</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/5.jpg">
								<div class="rent-notic">FOR Rent</div>
							</div>
							<div class="rp-info">
								<h5>Sofi Berryessa 750 N King Road</h5>
								<p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
							</div>
							<a href="#" class="rp-price">$1,600/month</a>
						</div>
					</div>
				</div>
				<!-- sidebar end -->
			</div>
		</div>
    </section>

@extends('_layouts.customFoot')

@endsection 