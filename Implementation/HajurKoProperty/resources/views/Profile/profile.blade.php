@extends('layouts.app')
<style>
    .hidden{
       display:none;
    }
    .i{
        background-color: #e6e7e5;
    }
    .infoP{
        border: 2px solid #e6e7e5;
    }
    .frm{
        border-left: 2px solid black;
    }
</style>
@section('content')
    <div class="container">   
        <h3 class="text-left text-info mt-3">Your Profile</h3>
        <small class="font-italic">View and edit your profile here</small>
        <hr>    
        <div class="row">
        <div class="col-md-5">
                <div class="card mt-3">
                    <div class="card-header h4">Profile Summary</div>
                    <div class="card-body">
                        <p class="p-2 infoP"><i class="fas fa-signature p-2 mr-1 i"></i>FullName: <span class="text-success font-weight-bold"> {!!Auth::user()->fullname!!} </span></p>
                        <p class="p-2 infoP"><i class="fas fa-envelope p-2 mr-1 i"></i> E-Mail: <span class="text-success font-weight-bold"> {!!Auth::user()->email!!} </span></p>
                        <p class="p-2 infoP"><i class="fas fa-map-pin p-2 pr-3 mr-1 i"></i> District: <span class="text-success font-weight-bold"> {!!Auth::user()->district!!} </span></p>
                        <p class="p-2 infoP"><i class="fas fa-city p-2 mr-1 i"></i> City: <span class="text-success font-weight-bold"> {!!Auth::user()->city!!} </span></p>
                        <p class="p-2 infoP"><i class="fas fa-address-card p-2 mr-1 i"></i> address: <span class="text-success font-weight-bold"> {!!Auth::user()->address!!} </span></p>
                        <p class="p-2 infoP"><i class="fas fa-phone p-2 mr-1 i"></i> Mobile Number: <span class="text-success font-weight-bold"> {!!Auth::user()->mobNo!!} </span></p>
                    </div>
                </div>
            </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 divProfile">
            <div class="card mt-3">
            <div class="card-header h4">Edit your profile</div>
                <div class="card-body">
                    <form action="{!! url('profile',Auth::user()->id) !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    {!! method_field('put') !!}
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label text-left">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="fullname" name="fullname" required value="{!! Auth::user()->fullname !!}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eamil" class="col-sm-3 col-form-label text-left">Email</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="email" name="email" required  readonly value="{!! Auth::user()->email !!}">
                                <small class="text-danger">NOTE: You cannot update your email</small>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="district" class="col-sm-3 col-form-label text-left">District</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="district" name="district" placeholder="" required value="{!! Auth::user()->district !!}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label text-left">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="city" id="city" required value="{!! Auth::user()->city !!}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label text-left">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" id="address" required value="{!! Auth::user()->address !!}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="mobno" class="col-sm-3 col-form-label text-left">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="mobno" name="mobilenumber" required value="{!! Auth::user()->mobNo !!}">
                            </div>
                        </div>

                        <p class="text-center">
                            <input type="submit" class="btn btn-success px-5 ml-5 shadow" name="Update" value="Update">   
                            <input type="submit" class="btn btn-danger px-5  ml-4 shadow" name="btnProfileCancel" value="Clear">
                        </P>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 