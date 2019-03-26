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
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
            <li> {{ $error  }}</li>
        @endforeach
    </ul>
</div>
@endif
	<!-- Page top section -->
	<section class="page-top-section set-bg" > 
		<div class="container text-white">
			@foreach($detail as $details)
			<h2>Property Details</h2>
			<h6> <span class="text-info" value="">{!! $details->propertyType !!}</span> - Suitable for - <span class="text-info">{!! $details->suitableFor !!}</span></h6>
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
								<div class="tag" name="ppfor">for {!! $details->propFor !!}</div>
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

								<form action="{!! url('/propDetail',[$details->id])!!}" method="POST">
									@csrf

									@if (!$book->isEmpty())	
										@foreach($book as $books)
											@if($books->user_id== Auth::user()->id && $books->propID==$details->id && $books->status=="unbooked")
											<button type="submit" id="btnU" onclick="newFunction1()" class="btn btn-danger pl-5 pr-5 pt-3 pb-3 font-weight-bold">Unbook</button>
											
											@else 
											<button type="submit"  id="btnB{!! $details->id !!}" onclick="newFunction()" name="book{!! $details->id !!}" class="btn btn-success pl-5 pr-5 pt-3 pb-3 font-weight-bold">Book Now</button>
											@endif
										@endforeach
									@else
										<button type="submit"  id="btnB{!! $details->id !!}" onclick="newFunction()" name="book{!! $details->id !!}" class="btn btn-success pl-5 pr-5 pt-3 pb-3 font-weight-bold">Book Now</button>
									@endif

								</form>
							</div>
						</div>
						<h3 class="sl-sp-title mt-3">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i> {!! $details->propSize !!} Square foot</p>
								<p><i class="fa fa-bed"></i> {!! $details->bedRoom !!} Bedrooms</p>
								<p><i class="fa fa-utensils"></i> {!! $details->kitchen !!} Kitchen</p>
								<p><i class="fa fa-motorcycle"></i> {!! $details->bikeP !!} Bike Parking</p>
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
								<p id=""><i class="fa fa-tint"></i>Water - RS. <span id="p1">{!! $details->waterP !!}</span></p>
								<p id="p2"><i class="fa fa-bolt"></i>Electricity - RS. {!! $details->electricP !!}</p>
								<p id="p3"><i class="fa fa-user"></i>Property Price- RS. {!! $details->totPrice !!}</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<form action="">
									@csrf
									@php
										
										$total = ($details->waterP + $details->electricP + $details->totPrice) * 10 / 100;

									@endphp
									<h4 class="text-info"> Your annual tax</h4>
									<h6 class="">{!! $total !!} / Year</h6>
									<button class="btn text-danger" type=""><i class="fa fa-print p-1"></i></button>
									
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
					
					<div class="related-properties">
						<h2>Related Property</h2>
						@php
							$side = DB::table('proptypes')
							->join('properties','properties.propType_id', '=', 'proptypes.id')
							->where('propFor','=',$details->propFor)
							->where('properties.id', '!=', $details->id)
							->limit('3')
							->get();
							// dd($side);

						@endphp
						@foreach($side as $sides)
							<div class="rp-item">
								<div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
								<div class="sale-notic">{!! $sides->propFor !!}</div>
								</div>
								<div class="rp-info">
									<h5>RS. {!! $sides->totPrice !!} /-</h5>
									<p><i class="fa fa-map-marker-alt"><span class="text-dark pl-1">{!! $sides->propLocation !!}</span></i></p>
									<p><span class="text-dark pl-1">{!! $sides->suitableFor !!}</span></p>
									<p><span class="text-dark pl-1" value="{!! $sides->suitableFor !!}">{!! $sides->suitableFor !!}</span></p>									
								</div>
								<a href="#" class="rp-price">View Details</a>
							</div>										
						@endforeach
					</div>
				</div>
				<!-- sidebar end -->
			</div>
		</div>
	</section>
	

@endforeach
@extends('_layouts.customFoot')
@endsection 

<script type="text/javascript" lang="javascript"> 

function newFunction(){
	document.getElementById("btnB{!! $details->id !!}").hidden=true;
}

calTax = function()
{
	var val1 = document.getElementById('p1').value;
	var val2 = document.getElementById('p2').value;
	var val3 = document.getElementById('p3').value;

	var total = parseInt(val1) + parseInt(val2) + parseInt(val3);

	document.getElementById('resBox').value =  document.getElementById('p1');
}

</script>	
