@extends('layouts.app')

@section('mainTitle') About-Hajurko Property @endsection

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
        <h2>About HajurKo Property</h2>
    </div>
</section>
<div class="container">
    <div class="row pt-5 pb-5">
        <div class="col-lg-6 col-md-6 text-center">
            <p class="text-center"><img class="shadow" src="{!! asset('images/abt.jpg') !!}" alt="officeImage" style="height: 350px;"></p>
        </div>
        <div class="col-lg-6 col-md-6 text-center"> 
            <h3 class="text-dark">Welcome to HajurKo Property</h3>
            <p class="text-justify">
               HajurKo Property is an web application that allows you to add and book property.
               This web application is an ingenious solution to the problem for searching property.
               Any person that uses this application will have the privilege of listing their own
               property as along with booking the property they desire. Old ways of searching house, 
               rooms or flat will be minimized with the help of this application. In Short it is an 
               unlimited resource for property and intelligent solution to find suitable home, office
               and any other property for you. 
            </p>
        </div>
    </div>
</div>
<div class="container-fluid bg-light">
    <div class="container pt-5 pb-5">
        <h3 class="text-center text-dark">Reviews of our service</h3>
        <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
                <h5 class="text-center pt-4">The kathmandu post</h5>
                <p><i>HajurKo Property is the best place to search for your 
                   dream homes, offices. kathmandu post is also a happy customer of HKP</i></p>
                   <img src="images/star.png" alt="" style="width:100px;">      
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <h5 class="text-center pt-4">The kathmandu post</h5>
                <p><i>HajurKo Property is the best place to search for your 
                   dream homes, offices. kathmandu post is also a happy customer of HKP</i></p>
                   <img src="images/star.png" alt="" style="width:100px;">
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <h5 class="text-center pt-4">The kathmandu post</h5>
                <p><i>HajurKo Property is the best place to search for your 
                   dream homes, offices. kathmandu post is also a happy customer of HKP</i></p>
                   <img src="images/star.png" alt="" style="width:100px;">
            </div>
        </div>
    </div>
</div>
@endsection