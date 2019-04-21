@extends('propcrud.mainPannel')
@section('mTitle') Hajurko Property-Edit property @endsection
@section('uadContent')

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
	padding: 20px;
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
  font-size: 10px;
}

.room-info .rf-right {
	float: right;
}

/*Feature category section*/

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
</style>
@section('uadContent')

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

<section class="banner_area p-4 mb-5">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content">
        <h1 class=""> Your listings </h1>
        <p class="text-danger"><small> You can view as well as edit your listrings </small></p>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    @foreach ($data as $datas)
    <div class="col-lg-4 col-md-6"  style="">
      <div class="card" style="width: 22rem;">
        <img class="card-img-top" src="{!! asset('uploads/files/'.$datas->image) !!}" alt="Card image cap" style="width: 22rem; height: 12rem;">
        
        {{-- <div class="topText top-right text-white"><i class="fa fa-plus"></i></div> --}}

        <div class="card-body">
          <div class="text-center feature-title">
            <h3 class="text-info pb-2">Price - RS {!! $datas->totPrice !!}</h3>
            <i class="fa fa-map-marker-alt"></i><small class="ml-1">{{ $datas->propLocation }}</small>
          </div>
        </div>
        <div class="room-info-warp">
          <div class="room-info">
            <div class="rf-left">
              <p><i class="fa fa-utensils"></i><span class="tag">{{ $datas->kitchen }}</span> Kitchen</p>
              <p><i class="fa fa-bed"></i><span class="tag">{{ $datas->bedRoom }}</span> Bedrooms</p>
            </div>
            <div class="rf-right">
              <p><i class="fa fa-couch"></i><span class="tag">{{ $datas->livingRoom }}</span> Living Room</p>
              <p><i class="fa fa-bath"></i><span class="tag">{{ $datas->tBathroom }}</span> Bathrooms</p>
            </div>	
          </div>

          <div class="room-info"> 
            <div>
              <h5 class="text-info pb-1 text-center" style="color: #878797"> Water</h5>
              <div class="rf-left">
                <p><i class="fa fa-tint"></i> Boaring <span class="tag">{{ $datas->waterB }}</span></p>
              </div>
              <div class="rf-right">
                <p><i class="fa fa-tint"></i>Drinking <span class="tag">{{ $datas->waterD }}</span> </p>
              </div>
            </div>
          </div>
          <div class="room-info"> 
            <div>
              <h5 class="text-info pb-1 text-center" style="color: #878797"> Parking</h5>
              <div class="rf-left">
                <p><i class="fa fa-motorcycle"></i><span class="tag">{{ $datas->bikeP }}</span> Bike </p>
              </div>
              <div class="rf-right">
                <p><i class="fa fa-car"></i><span class="tag">{{ $datas->carP }}</span>Car</p>
              </div>
            </div>	
          </div>
        </div>
              
        <div class="bg-white text-center pt-3" style="border-top: 1px solid #ebebeb;"> 
        <a href="{!! url('/editProp', $datas->id) !!}" type="button" class="btn btn-Success mb-1" style="border-radius: 25px;">View and Edit</a>
            <form action="{!! url('/editProp',[$datas->id]) !!}" method="POST">
                @csrf
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure?')" ><i value="delete" class="fa fa-trash pr-1"></i>Delete</button>
            </form>   
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
