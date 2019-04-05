@extends('adminjob.mainApannel')
<style>
    .mainA{
    }
    .controls{
        cursor: pointer;
        box-shadow:  2px 5px 10px 2px rgba(0,0,0,0.3);
    }
    .controls:hover{
        box-shadow:  0px 0px 0px 0px rgba(0,0,0,0);
        color: white;
    }
    .mainA img{
        width: 100px;
        height: 100px;
    }
</style>
@section('uadContent')
<div class="container mainA">
    <h3 class="text-center p-4">Admin Dashboard</h3>
    <div class="row  center text-white">
        <a class="col-lg-3 col-md-4 bg-info text-white mt-3 mb-3 pt-3 pb-3 controls" href="{!! URL::to('/adminAdd') !!}" style="width: 22rem;">
            <h4 class="text-center"><img src="{!! asset('images/team.png') !!}" alt="eventLogo"></h4>
            <h4 class="text-center">Members</h4>
            <p class="text-center"><small>Add & Delete Admin</small></p>
        </a>
        <a class="col-lg-1 col-md-4"></a>
        <a class="col-lg-3 col-md-4 bg-info text-white mt-3 mb-3 pt-3 pb-3 controls" href="{!! URL::to('/propVA') !!}" style="width: 22rem;">
            <h4 class="text-center"><img src="{!! asset('images/blog.png') !!}" alt="sportlogo"></h4>
            <h4 class="text-center">Property</h4>
            <p class="text-center"><small>Verify & Approve</small></p>              
        </a>
        <a class="col-lg-1 col-md-4"></a>
        <a class="col-lg-3 col-md-4 bg-info text-white mt-3 mb-3 pt-3 pb-3 controls" href="{!! URL::to('/adminQueries') !!}" style="width: 22rem;">
            <h4 class="text-center"><img src="{!! asset('images/question.png') !!}" alt="memberlogo"></h4>
            <h4 class="text-center">Admin</h4>
            <p class="text-center"><small>Queries</small></p>              
        </a>
     </div> 
</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-6 p-2 bg-light">
            <p class="align-middle pt-4">The total numbers of people that has visited hajurko property up to now</p>
        </div>
        <div class="col-lg-3 p-2 bg-secondary text-white">
            <h5 class="text-center">Visitors</h5>
            <div class="text-center"><h3>25600</h3></div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
    </div>
</div>
@endsection