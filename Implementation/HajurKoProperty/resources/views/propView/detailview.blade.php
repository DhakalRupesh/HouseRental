@extends('layouts.app')

@section('mainTitle') Home-Hajurko Property @endsection

@extends('_layouts.customTop')
<style>
	.page-top-section{
		background-image: url("../img/review-bg.jpg");
		background-repeat: no-repeat;
		background-position: cover;
	}
	.tag{

		position: absolute;
		top: 8px;
		right: 8px; 
		color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    background: #e94646;
    padding: 7px 13px;
    display: inline-block;
    border-radius: 2px;
		z-index: 3;
	}
</style>
@section('content')
	<!-- Page top section -->
	<section class="page-top-section set-bg" > 
		<div class="container text-white">
			@foreach($detail as $details)
			<h2>Property Details</h2>
			<h5>Suitable for - <span class="text-info">{!! $details->suitableFor !!}</span></h5>
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
								<div class="tag">{!! $details->propFor !!}</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ asset('images/bannerH.jpg') }}" alt="Second slide">
								<div class="tag">for rent</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ asset('images/log.jpg') }}" alt="Third slide">
								<div class="tag">for rent</div>
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
							<h2>Rs.{!! $details->totPrice !!} /-</h2>
								<p><i class="fa fa-map-marker-alt"></i>{!! $details->propLocation !!}</p>
								<small>District: {!! $details->propDistrict !!}</small>
							</div>
							<div class="col-xl-4 mt-2">
								<a href="#" class="btn btn-success pl-5 pr-5 pt-3 pb-3 font-weight-bold">Book Now</a>
							</div>
						</div>
						<h3 class="sl-sp-title mt-3">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i> {!! $details->propSize !!} Square foot</p>
								<p><i class="fa fa-bed"></i> {!! $details->bedRoom !!} Bedrooms</p>
								<p><i class="fa fa-utensils"></i> {!! $details->kitchen !!} Kitchen</p>
								<p><i class="fa fa-trophy"></i> {!! $details->bikeP !!} Bike Parking</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-couch"></i>{!! $details->livingRoom !!} Living Room</p>
								<p><i class="fa fa-th-large"></i>{!! $details->totRooms !!} Total room</p>
								<p><i class="fa fa-car"></i>{!! $details->carP !!} Car Parking</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-shower"></i>{!! $details->tBathroom !!} Toilet/Bathroom</p>
								<p><i class="fa fa-tint"></i>{!! $details->waterB !!} Boaring Water</p>
								<p><i class="fa fa-tint"></i>{!! $details->waterD !!} Drinking Water</p>		
							</div>
						</div>
						<h3 class="sl-sp-title mt-3">Price</h3>
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-tint"></i>Water - RS. {!! $details->waterP !!}</p>
								<p><i class="fa fa-bolt"></i>Electricity - RS. {!! $details->electricP !!}</p>
								<p><i class="fa fa-user"></i>Property Price- RS. {!! $details->totPrice !!}</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<form action="">
									@csrf
									<input type="button" id="taxCalbtn" class="btn btn-success pl-5  pr-5 p-2 pb-2 font-weight-bold" value="Calculate Tax">
									<input type="text" name="kitchen" class="form-control mt-2" placeholder="Result" readonly>
								</form>
							</div>
						
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p>{!! $details->description !!}</p>
						</div>
						<h3 class="sl-sp-title bd-no">Location</h3>
						<div class="pos-map" id="map-canvas"></div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<h3 class="text-primary text-center">Contact Owner</h3>
						<div class="author-info">
						@foreach ( $usrDetail as $usrDetails)
							<h5>{!! $usrDetails->fullname !!}</h5>
							<p>Property Owner</p>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i>(+977){!! $usrDetails->mobNo !!}</p>
							<p><i class="fa fa-envelope"></i>{!! $usrDetails->email !!}</p>
						@endforeach
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
	
<script>
	$(document).ready(function(){
			$("#taxCalbtn").Click(function(){
				alert("new");
			});
	});
</script>	
@endforeach



@endsection 