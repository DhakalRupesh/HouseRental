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
                It is a long established fact that a reader will be distracted by the readable 
                content of a page when looking at its layout. The point of using Lorem Ipsum is 
                that it has a more-or-less normal distribution of letters, as opposed to using 
                'Content here, content here', making it look like readable English. Many desktop 
                publishing packages and web page editors now use Lorem Ipsum as their default 
                model text, and a search for 'lorem ipsum' will uncover many web sites still in 
                their infancy. Various versions have evolved over the years, sometimes by accident, 
                sometimes on purpose (injected humour and the like).
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