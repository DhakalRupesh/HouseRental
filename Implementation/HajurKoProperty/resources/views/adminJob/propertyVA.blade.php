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
<h4>Add property types</h4>
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row mb-3">
                    <div class="col">
                        <label class=" form-control-label">Add Property Type</label>
                        <div class="input-group">
                            {{-- <div class="input-group-addon"><i class="fa fa-map-marker-alt"></i></div> --}}
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
    </div>
@endsection