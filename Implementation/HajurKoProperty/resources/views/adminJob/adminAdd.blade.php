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
        <h5>Admin requests</h5>
        {{-- <div class="row"> --}}
            <div>
                <table class="table table-striped table-hover">
                    <caption>Admin request approval</caption>
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Requested By</th>
                            <th scope="col">Email</th>
                            <th scope="col">View More Details</th>
                            <th scope="col">Approve/Delete</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <!-- Select all the data from the Sports table and Show it in a web table -->
                        @php
                            $i = 0;
                        @endphp
                        @if($getUsr->count())
                        @foreach($getUsr as $getUsrs)
                        @php
                            $i = $i + 1;   
                        @endphp
                        <tr>
                            <th scope="row"> {!! $i !!} </th>
                            <td>{!! $getUsrs->fullname !!}</td>
                            <td>{!! $getUsrs->email !!}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#usrDetail"><u>View More</u></a>
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="usrDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{!! $getUsrs->fullname !!}'S Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><span class="text-uppercase"><b>E-MAIL : </b></span> {!! $getUsrs->email !!} </p>
                                            <p><span class="text-uppercase"><b>DISTRICT : </b></span> {!! $getUsrs->district !!} </p>
                                            <p><span class="text-uppercase"><b>CITY : </b></span> {!! $getUsrs->city !!} </p>
                                            <p><span class="text-uppercase"><b>ADDRESS : </b></span> {!! $getUsrs->address !!} </p>
                                            <p><span class="text-uppercase"><b>MOBILE : </b></span> {!! $getUsrs->mobNo !!} </p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{!! url( 'adminAdd',$getUsrs->id)!!}" method="POST">
                                    @csrf
                                    {!! method_field('put') !!}
                                    <button type="submit" class="btn btn-success btn-sm float-left ml-2 mt-1 pl-3 pr-3" value="">Accept</button>
                                </form>
                                <form action="{!! url( 'adminremove',$getUsrs->id)!!}" method="POST">
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
    
    
@endsection