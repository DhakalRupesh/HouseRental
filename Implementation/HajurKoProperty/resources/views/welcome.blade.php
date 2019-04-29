@extends('layouts.app')

@section('mainTitle') Home-Hajurko Property @endsection

<style>
    .banner_area{
        background: url('images/abtUS.jpg');
    }
    .banner_area {
        min-height: 200px;
    }
    
    .topText:hover{
        Cursor:pointer;
        opacity: 0.5;
        transition: 2s;
    }
    
    .topText{
        position: absolute;
        top: 8px;
        right: 16px;
        padding: 2px 8px 2px 8px;
        margin: 0 0 0 5px;
        color: #fff;
        background: #060606;
        border-radius: 100px;
        padding: 7px 13px;
    }
    
    .feature-title p i {
        color: #30caa0;
    }
    
    .feature-title i {
        color: #30caa0;
    }
    /* feature */
    
    .feature-section .container {
        margin-bottom: -50px;
    }
    
    .feature-item {
        margin-bottom: 50px;
    }
    
    .feature-item .room-price {
        display: block;
        font-size: 18px;
        font-weight: 600;
        background: #fff;
        text-align: center;
        padding: 13px;
        background: #30caa0;
        color: #fff;
    }
    
    .feature-pic {
        height: 250px;
    }
    
    .feature-pic .sale-notic,
    .feature-pic .rent-notic {
        margin: 20px;
    }
    
    .feature-text {
        border-left: 1px solid #ebebeb;
        border-right: 1px solid #ebebeb;
    }
    
    .feature-title h3 {
        font-weight: 400;
    }
    
    .feature-title p i {
        color: #30caa0;
    }
    
    .room-info-warp {
        padding: 12px;
        padding-bottom: 0;
    }
    
    .room-info {
        border-top: 1px solid #ebebeb;
        padding-top: 20px;
        overflow: hidden;
    }
    
    .room-info p {
        margin-bottom: 15px;
    }
    
    .room-info p i {
        color: #30caa0;
        margin-right: 10px;
    }
    
    .room-info:last-child .rf-right {
        padding-right: 14px;
    }
    
    .room-info .rf-left {
        float: left;
        /* font-size: 10px; */
    }
    
    .room-info .rf-right {
        float: right;
        /* font-size: 10px; */
    }
    
    /*-----------------------------
        Feature category section
    -----------------------------*/
    
    .feature-category-section {
        background: #f7f7f7;
    }
    
    .f-cata {
        text-align: center;
    }
    
    .f-cata img {
        margin-bottom: 20px;
    }
    
    .f-cata h5 {
        font-weight: 400;
    }
    
    .gallery {
        margin-right: -20px;
    }
    
    .gallery:after {
        content: '';
        display: block;
        clear: both;
    }
    
    .grid-sizer {
        width: calc(25% - 20px);
    }
    
    .gallery-item {
        width: calc(25% - 20px);
        height: 285px;
        display: table;
        position: relative;
        float: left;
        margin-bottom: 20px;
    }
    
    .gallery-item.grid-long {
        width: calc(50% - 20px);
    }
    
    .gallery-item.grid-wide {
        width: calc(50% - 10px);
    }
    
    .gallery-item:after {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: #000;
        opacity: 0.4;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
    }
    /* span tags */
    .tag{
        background-color: #defcfc;
        padding: 0 5px 0 5px;
    }

    .detailV:hover{
        cursor: pointer;
    }
    .feture-img img{
        width: 272px;
        height: 200px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    .feture-img{
        font-weight: 400;
        margin-bottom: 30px;
    }

</style>

@section('content')

<section class="home_banner_area" style="margin-bottom: 15px">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h5>We Believe in making your dream come true</h5>
                <h3>Find Your Dream Home</h3>
            <a class="main_btn " href="{!! URL::to('/about') !!}">Learn More</a>
            </div>
        </div>
    </div>
        <!-- custom search -->
    <div class="container">
        <div class="advanced_search">
            <h3>Filter Property</h3>
            <div class="search_select">
                <form action="/customSearchReasult" >
                    @csrf
                    <input type="text" class="s_Select mb-3" name="loc" placeholder="Enter a location......">
                    <input type="text" class="s_Select mb-3" name="proPrice" placeholder="Enter price......">
                    {{-- <input type="text" name="proPrice" id=""> --}}
                    <button class="main_btn mt-4">SEARCH</button>
                </form>
            </div>
        </div>
    </div>
    <!-- custom search end -->
</section>

<div class="container pt-5 mt-4">
    {{-- <input type="hidden"> --}}
</div>

<div class="container mt-5 pt-5">
    <div class="text-center">
        <h2 class="text-dark mb-2">Featured Listings</h2>
        <small>Browse the featured product and select your's</small>
    </div>
</div>
<div class="container">
  <div class="row">
    @foreach($welprop as $welprops)
    <div class="col-lg-4 col-md-6 mt-5"  style="">
      <div class="card shadow" style="width: 22rem;">
        
        <img class="card-img-top" src="{!! asset('uploads/files/'.$welprops->image) !!}" alt="Card image cap" style="width: 22rem; height: 12rem;">

        {{-- <div class="topText top-right text-white"><i class="fa fa-plus"></i></div> --}}

        <div class="card-body">
          <div class="text-center feature-title">
            <h3 class="text-info pb-2">Price: {!! $welprops->totPrice !!}</h3>
            <i class="fa fa-map-marker-alt"></i><small class="ml-1">{!! $welprops->propLocation !!}</small>
          </div>
        </div>
        <div class="room-info-warp">
          <div class="room-info">
            <div class="rf-left">
              <p><i class="fa fa-utensils"></i>{!! $welprops->kitchen !!}Kitchen</p>
              <p><i class="fa fa-bed"></i>{!! $welprops->bedRoom !!} Bedrooms</p>
            </div>
            <div class="rf-right">
              <p><i class="fa fa-couch"></i>{!! $welprops->livingRoom !!}Living Room</p>
              <p><i class="fa fa-bath"></i>{!! $welprops->tBathroom !!} Bathrooms</p>
            </div>	
          </div>

          <div class="room-info"> 
            <div>
              <div class="rf-left">
                <p><i class="fa fa-motorcycle"></i>{!! $welprops->bikeP !!} Bike </p>
                <p><i class="fa fa-tint"></i>{!! $welprops->waterB !!} Boaring </p>
              </div>
              <div class="rf-right">
                <p><i class="fa fa-car"></i>{!! $welprops->carP !!} Car </p>
                <p><i class="fa fa-tint"></i>{!! $welprops->waterD !!} Drinking </p>
              </div>
            </div>	
          </div>

        </div>
         
        <a class="bg-info text-center p-2 detailV" href="{{ URL::to('/propDetail', $welprops->id) }}" > 
            <h4 class="text-white pt-1"> View Details </h4>
        </a>
      </div>
    </div>
    @endforeach
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

{{-- <div class="container">
    <p class='text-center p-1'>VcOunt</p> 
</div> --}}

<div class="container"> 
    <div class="vCount">
        <p class="text-info"></p>
    </div>
</div>
@auth
@if(Auth::user()->uType == 0)
<div class="container pt-4">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6 p-2 bg-light">
            <p class="text-justify pt-4 p-4">
                Do You want to earn money? just by being admin of the page and manage our stuff.
                but the consequences is you will be unable to add property listing as the normal user.
                You should create seperate user account to do that.
            </p>
        </div>
        <div class="col-lg-2 p-2 bg-secondary text-white">
            <h5 class="text-center pt-4">Become a Admin ??</h5>
            @auth
                @if(Auth::user()->id and Auth::user()->arequest == 'requested')
                    <p class="text-center"><small>Your Request is Pending</small></p>
                @else
                    <form action="{{ url('/',Auth::user()->id) }}" method="post" class="text-center" enctype="multipart/form-data">
                        @csrf
                        {!! method_field('put') !!}
                        <button class="btn btn-primary mt-1"> Send Request </button>
                    </form>
                    <form action="{{ url('/',Auth::user()->id) }}" method="post" class="text-center" enctype="multipart/form-data">
                @endif
            @endauth
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
    </div>
</div>
@endif
@endauth
@endsection 
<script>
    $(document).ready(function () {
        $("#proType").change(function () {
        var selectedText2 =  $("#proType option:selected").text();
        // alert("You selected :" + selectedText2 );
        $('[name="catvalue"]').val(selectedText2);
    });
});
</script>