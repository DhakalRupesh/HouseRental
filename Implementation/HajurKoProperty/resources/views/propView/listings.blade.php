@extends('layouts.app')

@section('mainTitle') Listings-Hajurko Property @endsection

@extends('_layouts.customTop')
<style>
    .page-top-section{
        background-image: url("../img/review-bg1.jpg");
        background-repeat: no-repeat;
        background-position: cover;
    }
</style>
@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg mb-5" > 
    <div class="container text-white">
        <h2>Property Listings</h2>
    </div>
</section>

<div class="container">
{{-- <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Property Details</u></h4> </label> --}}
    <div class="form-group float-right mb-3 catbox">
        <label class=" form-control-label">Select Property type</label>
        <div class="input-group">
            <div class="input-group-addon"></div>
            <select class="form-control" name="propType" required>
                <option value="">new</option>
                <option value="">new1</option>
                <option value="">naya</option>
            </select>
        </div>
    </div>
</div>
<div class="container">
    <h2>this is second container</h2>

    <div class=" mt-5">
        <div class="text-center">
            <h2 class="text-dark mb-2">Featured Listings</h2>
            <small>Browse the featured product and select your's</small>
        </div>
      <div class="row">
     
        <div class="col-lg-4 col-md-6 mt-5"  style="">
          <div class="card shadow" style="width: 22rem;">
            <img class="card-img-top" src="images/hs.jpg" alt="Card image cap">
            <div class="topText top-right text-white"><i class="fa fa-plus"></i></div>
    
            <div class="card-body">
              <div class="text-center feature-title">
                <h3 class="text-info pb-2">Price: 20,00,000</h3>
                <i class="fa fa-map-marker-alt"></i><small class="ml-1"></small>
              </div>
            </div>
            <div class="room-info-warp">
              <div class="room-info">
                <div class="rf-left">
                  <p><i class="fa fa-utensils"></i>10 Kitchen</p>
                  <p><i class="fa fa-bed"></i>10 Bedrooms</p>
                </div>
                <div class="rf-right">
                  <p><i class="fa fa-couch"></i>10 Living Room</p>
                  <p><i class="fa fa-bath"></i>10 Bathrooms</p>
                </div>	
              </div>
    
              <div class="room-info"> 
                <div>
                  <div class="rf-left">
                    <p><i class="fa fa-motorcycle"></i>10 Bike </p>
                    <p><i class="fa fa-tint"></i>Yes Boaring </p>
                  </div>
                  <div class="rf-right">
                    <p><i class="fa fa-car"></i>10 Car</p>
                    <p><i class="fa fa-tint"></i>Yes Drinking  </p>
                  </div>
                </div>	
              </div>
    
            </div>
                  
        <a class="bg-info text-center p-2 detailV" href="" style="border-top: 1px solid #ebebeb;"> 
                <h4 class="text-white pt-1"> View Details </h4>
            </a>
          </div>
        </div>

      </div>
    </div>
    <div class="container-fluid bg-light mt-5 p-5">
        <div class="container">
            <div class="text-center pb-3">
                <h2>Looking for property?</h2>
                <small>We will help you search</small>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center feture-img">
                    <img src="images/hs.jpg" alt="singleHouse">
                    <h5>Family House</h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center feture-img">
                    <img src="images/sinRoom.jpg" alt="singleRoom">
                    <h5>Single Room</h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center feture-img">
                    <img src="images/apartment.jpg" alt="apartment">
                    <h5>Apartments(Flats)</h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center feture-img">
                    <img src="images/off.jpg" alt="office">
                    <h5>Office buldings/Flats</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection