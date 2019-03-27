@extends('adminjob.mainApannel')

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

    <div class="container mt-3 mb-3">
        <h5>Property listing requests</h5>
        {{-- <div class="row"> --}}
            <div>
                <table class="table table-striped table-hover">
                    <caption>Property Approval</caption>
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Property For</th>
                            <th scope="col">Property Location</th>
                            <th scope="col">Posted By</th>
                            <th scope="col">Approve/Delete</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <!-- Select all the data from the Sports table and Show it in a web table -->
                        @php
                            $i = 0;
                        @endphp
                        @if($propApproval->count())
                        @foreach($propApproval as $propApprovals)
                        @php
                            $i = $i + 1;   
                        @endphp
                        <tr>
                            <th scope="row"> {!! $i !!} </th>
                            <td>{!! $propApprovals->propFor !!}</td>
                            <td>{!! $propApprovals->propLocation !!}</td>
                            <td>{!! $propApprovals->fullname !!}
                                <br><a href="" data-toggle="modal" data-target="#usrDetail"><u>View More</u></a>
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="usrDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{!! $propApprovals->fullname !!}'S Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><span class="text-uppercase"><b>E-MAIL : </b></span> {!! $propApprovals->email !!} </p>
                                            <p><span class="text-uppercase"><b>DISTRICT : </b></span> {!! $propApprovals->district !!} </p>
                                            <p><span class="text-uppercase"><b>CITY : </b></span> {!! $propApprovals->city !!} </p>
                                            <p><span class="text-uppercase"><b>ADDRESS : </b></span> {!! $propApprovals->address !!} </p>
                                            <p><span class="text-uppercase"><b>MOBILE : </b></span> {!! $propApprovals->mobNo !!} </p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{!! url( 'propVA',$propApprovals->id)!!}" method="POST">
                                    @csrf
                                    {!! method_field('put') !!}
                                    <button type="submit" class="btn btn-success btn-sm float-left ml-2 mt-1 pl-3 pr-3" value="">Accept</button>
                                </form>
                                <form action="{!! url( 'propVA',$propApprovals->id)!!}" method="POST">
                                    @csrf
                                    {!! method_field('put') !!}
                                    <button type="submit" class="btn btn-danger btn-sm pl-3 pr-3 mt-1 ml-2"> Decline</button>
                                </form>
                            </td>
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
        {{-- </div> --}}
    </div>
    
    
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-2 p-2 bg-secondary" style="border-radius: 10px 0px 0px 10px;">
                <p class="align-middle text-light text-center pt-5">Add Property Type</p>
            </div>
            <div class="col-lg-6 text-white">
                <form action="" method="post" class="p-1" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col">
                            <h5 class=" form-control-label"></h5>
                            <div class="input-group">
                                <input type="text" name="propType" class="form-control" placeholder="add property type...." required>
                            </div>
                            <small class="form-text text-muted">ex.Flat</small>
                        </div>
                    </div>
                    <p class="text-center mt-1">
                        <input type="submit" class="btn btn-success btn-block shadow" name="insert" value="Submit">   
                    </P>
                </form>
            </div>
            <div class="col-lg-2 p-2 bg-secondary" style="border-radius: 0px 10px 10px 0px;">
                <p class="align-middle text-secondary pt-5">Add Property Type</p>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
@endsection