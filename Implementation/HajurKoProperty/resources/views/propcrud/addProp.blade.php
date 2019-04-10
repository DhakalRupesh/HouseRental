@extends('propcrud.mainPannel')

@section('mTitle') Hajurko Property-Add property @endsection

<link href="{!! asset('Links/imgLinks/fileinput.css') !!}" rel="stylesheet" />
<!-- js -->
<script src="{!! asset('Links/imgLinks/jquery.ajaxy.js') !!}"></script>

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

<div class="card mt-3">
            <div class="card-header h4 text-primary">Add your property</div>
                <div class="card-body">
                    <form action="{!! url('addProp') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                        <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Property Details</u></h4> </label>
                        <div class="form-group">
                            <label class=" form-control-label">Property Type</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                <select class="form-control" name="propType" required>
                                    @foreach($pt as $pts)
                                        <option value={{$pts->id}}>{{$pts->propertyType}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class=" form-control-label">Property For</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="propFor" id="inlineRadio1" value="Sale" required>
                                <label class="form-check-label" for="inlineRadio1">Sale</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="propFor" id="inlineRadio2" value="Rent" required>
                                <label class="form-check-label" for="inlineRadio2">Rent</label>
                            </div>
                        </div>
                        
                        <input type="hidden" name="uid" value="{{ Auth::user()->id }}">

                        <div class="form-row mb-3">
                            <div class="col">
                                <label class=" form-control-label">District</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker-alt"></i></div>
                                    <input type="text" name="district" class="form-control" required>
                                </div>
                                <small class="form-text text-muted">ex.Lumbini</small>
                            </div>

                            <div class="col">
                                <label class=" form-control-label">Location</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker-alt"></i></div>
                                    <input type="text" name="location" class="form-control" required>
                                </div>
                                <small class="form-text text-muted">ex. Nayabazar,Kathmandu</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Size</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-th-large"></i></div>
                                <input type="number" name="size" class="form-control">
                            </div>
                            <small class="form-text text-muted">ex.2500sqfeet</small>
                        </div>

                        <div class="form-group"> 
                            <label> Suitable For </label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="suitable" id="inlineRadio1" value="Office">
                                <label class="form-check-label" for="inlineRadio1">Office</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="suitable" id="inlineRadio2" value="Resident">
                                <label class="form-check-label" for="inlineRadio2">Resident</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="suitable" id="inlineRadio1" value="Both office and resident">
                                <label class="form-check-label" for="inlineRadio1">Both office and resident</label>
                            </div>
                        </div>

                        <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Price Section</u></h4> </label>
                        <small class="text-danger">NOTE: Tax will be calculated automatically</small>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label class=" form-control-label">Water Price</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker-alt"></i></div>
                                    <input type="number" placeholder="price in RS...." name="watPrice" class="form-control">
                                </div>
                                <small class="form-text text-muted">Leave empty if not charged</small>
                            </div>

                            <div class="col">
                                <label class=" form-control-label">Electricity Price</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fas fa-bolt"></i></div>
                                    <input type="number" placeholder="price in RS...." name="electricP" class="form-control">
                                </div>
                                <small class="form-text text-muted">Leave empty if not charged</small>
                            </div>

                            <div class="col">
                                <label class=" form-control-label">Price for property</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker-alt"></i></div>
                                    <input type="number" placeholder="price in RS...." name="propPrice" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Property Description</u></h4></label><br>
                            <textarea name="description" cols="30" rows="5" class="form-control" id="detail" aria-describedby="description" placeholder="Provide detail about the Property" required></textarea>
                            <small class="text-info">You can describe the extra features and other many aspects</small>
                        </div>

                        <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Facilities</u></h4> </label>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <div class="col">
                                <label class=" form-control-label">Bike Parking</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-motorcycle"></i></div>
                                    <input type="number" name="bikeP" class="form-control" placeholder="only number allowded..." required>
                                </div>
                            </div>
                            <div class="col">
                                <label class=" form-control-label">Car Parking</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                    <input type="number" name="carP" class="form-control" required>
                                </div>                          
                            </div>
                        </div>

                        <div class="form-row" style="margin-bottom: 15px;">
                            <div class="col">
                                <label class=" form-control-label">Boaring Water</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                    <select class="form-control" name="waterB" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label class=" form-control-label">Drinking Water</label>
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                    <select class="form-control" name="waterD" >
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Room Details</u></h4> </label><br>
                        <label class="text-danger">NOTE : You can leave these fields empty in case you are posting single room only</label>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <div class="col">
                                <label class=" form-control-label">Kitchen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-utensils"></i></div>
                                    <input type="number" name="kitchen" class="form-control" >
                                </div>
                            </div>
                            <div class="col">
                                <label class=" form-control-label">Bed Room</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bed"></i></div>
                                    <input type="number" name="bedRoom" class="form-control" required>
                                </div>                          
                            </div>
                        </div>

                        <div class="form-row" style="margin-bottom: 15px;">
                            <div class="col">
                                <label class=" form-control-label">Living Room</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-couch"></i></div>
                                    <input type="number" name="livingRoom" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <label class=" form-control-label">Toilet/Bathroom</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-shower"></i></div>
                                    <input type="number" name="tBathroom" class="form-control" required>
                                </div>                          
                            </div>
                            <div class="col">
                                <label class=" form-control-label">Total Rooms</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="">Room</i></div>
                                    <input type="number" name="totRoom" class="form-control" required>
                                </div>                          
                            </div>
                        </div>

                        <label class="mt-3"> <h4 class="text-danger font-weight-bold"><u>Images</u></h4></label><br>
                        <label> Select four Images</label>
                        <div class="form-row">
                            <div class="col-lg-4 col-sm-4 col-11 main-section">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>

                        <p class="text-center mt-5">
                            <input type="submit" class="btn btn-success btn-block shadow" name="insert" value="Submit">   
                        </P>
                    </form>
                </div>
            </div>
@endsection