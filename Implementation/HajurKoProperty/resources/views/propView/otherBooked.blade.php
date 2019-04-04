@extends('propcrud.mainPannel')
@section('mTitle') Hajurko Property-Update property @endsection
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

<div class="container bg-light p-3">
    <h3 class="text-primary pb-2">Your Property booked by other</h3>
    <table class="table table-striped table-hover">
        <caption>Booked property by other</caption>
        <thead class="thead-dark">

            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Property Location</th>
                <th scope="col">Property Details</th>
                <th scope="col">Booked By</th>
            </tr>
            
        </thead>
        <tbody>
        <!-- Select all the data from the Sports table and Show it in a web table -->
            @php
                $i = 0;
            @endphp
            @if($otherBooked->count())
            @foreach($otherBooked as $otherBookeds)
            @php
                $i = $i + 1;   
            @endphp
            <tr>
                <th scope="row"> {!! $i !!} </th>
                <td>{!! $otherBookeds->propLocation !!}</td>
                <td>
                    <a href="" data-toggle="modal" data-target="#propDetail"><u>Property detail</u></a>  
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="propDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Property Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <span class="text-uppercase">Property For : </span>     <span>{!! $otherBookeds->propFor !!}</span><br>
                                <span class="text-uppercase">property District : </span><span>{!! $otherBookeds->propDistrict !!}</span><br>
                                <span class="text-uppercase">Size : </span>             <span>{!! $otherBookeds->propSize !!}</span> <br>
                                <span class="text-uppercase">suitable for : </span>     <span>{!! $otherBookeds->suitableFor !!}</span> <br>
                                <span class="text-uppercase">water price : </span>      <span>{!! $otherBookeds->waterP !!}</span> <br>
                                <span class="text-uppercase">electric price : </span>   <span>{!! $otherBookeds->electricP !!}</span> <br>
                                <span class="text-uppercase">total price : </span>      <span>{!! $otherBookeds->totPrice !!}</span> <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <hr>
                                        <h5 class="font-weight-bold">FACILITIES</h5>
                                        <hr>
                                        <span class="text-uppercase ">Bike parking : </span><span>{!! $otherBookeds->propFor !!}</span><br>
                                        <span class="text-uppercase ">car parking : </span><span>{!! $otherBookeds->propFor !!}</span><br>
                                        <span class="text-uppercase ">boaring water : </span><span>{!! $otherBookeds->propFor !!}</span><br>
                                        <span class="text-uppercase ">drinking water : </span><span>{!! $otherBookeds->propFor !!}</span><br>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <hr>
                                        <h5 class="font-weight-bold">ROOM DETAILS</h5>
                                        <hr>
                                        <span class="text-uppercase ">kitchen :  </span><span>{!! $otherBookeds->kitchen !!}</span>  <br>
                                        <span class="text-uppercase ">bed room : </span><span>{!! $otherBookeds->bedRoom !!}</span>  <br>
                                        <span class="text-uppercase ">living room : </span><span>{!! $otherBookeds->livingRoom !!}</span>  <br>
                                        <span class="text-uppercase ">toilet/ bathroom : </span><span>{!! $otherBookeds->tBathroom !!}</span>  <br>
                                        <span class="text-uppercase ">total rooms : </span><span>{!! $otherBookeds->totRooms !!}</span>  <br>
                                    </div>                               --}}
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>   
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#usrDetail"><u>View Detail</u></a>
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="usrDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{!! $otherBookeds->fullname !!}'S Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p><span class="text-uppercase font-weight-bold">FULL NAME : </span>{!! $otherBookeds->fullname !!}</p>
                                <p><span class="text-uppercase font-weight-bold">E-MAIL : </span> {!! $otherBookeds->email !!} </p>
                                <p><span class="text-uppercase font-weight-bold">DISTRICT : </span> {!! $otherBookeds->district !!} </p>
                                <p><span class="text-uppercase font-weight-bold">CITY : </span> {!! $otherBookeds->city !!} </p>
                                <p><span class="text-uppercase font-weight-bold">ADDRESS : </span> {!! $otherBookeds->address !!} </p>
                                <p><span class="text-uppercase font-weight-bold">MOBILE : </span> {!! $otherBookeds->mobNo !!} </p>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
                {{-- <td>
                    <form action="" method="POST">
                        @csrf
                        {!! method_field('put') !!}
                        <button type="submit" class="btn btn-danger btn-sm pl-3 pr-3 mt-1 ml-2"> Unbook</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center text-danger"><h5>No record found</h5></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection 