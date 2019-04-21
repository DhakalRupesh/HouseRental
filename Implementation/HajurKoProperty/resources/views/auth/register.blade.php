@extends('layouts.app')

@section('mainTitle') Register-Hajurko Property @endsection

    <style>

        body{
            background-color: #fafafa;
            background: url('images/hBanner.jpg');
            background-position: top ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .main{
            border-radius: 7px;
            padding: 30px;
            box-shadow: 0px 0px 15px 0px;
        }
        .cbody{
            background-color: #fafafa;
        }
        .regcon{
            margin-bottom: 20px;
        }

    </style>

@section('content')
<div class="bdy"> </div>
<div class="container regcon">
    <div class="row">
      <div class="col-lg-6 text-dark">
        <h2 class="mt-5 text-center text-underline">Join our community</h2>
        <p >Join to take full advantage of all the great deals on property. And also to use variety of features from hajurko property</p>
      </div>
      <div class="col-lg-6">
        <div class="card text-center text-white mt-5">
          <div class="card-heading bg-info">
            <h2>{{ __('Sign Up') }}</h2>
            <p><strong>Connect</strong> with us</p>
        </div>
            <div class="card-body cbody">
                <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('name') }}"  placeholder="Full Name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fullname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group ">
                    <input type="text" name="district"  class="form-control form-control-sm" placeholder="District" required>
                    <div id="valid" style="color: red;"> </div>
                    <small id="emailHelp" class="form-text text-left text-muted">Ex: Gorkha</small>
                </div>

                <div class="form-group ">
                    <select class="form-control form-control-sm" name="city" required>
                        <option selected disabled>Choose your city.....</option>
                        <option>Biratnagar</option>
                        <option>Janakpur</option>
                        <option>Hetuda</option>
                        <option>Pokhara</option>
                        <option>Butwal</option>
                        <option>Birendranagar</option>
                        <option>Kathmandu</option>
                        <option>Chitwan</option>
                        <option>Biratnagar</option>
                        <option>Jhapa</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="address"  class="form-control form-control-sm" placeholder="Address" required>
                    <div id="valid" style="color: red;"> </div>
                </div>

                <div class="form-group">
                    <input type="text" name="mobNo"  class="form-control form-control-sm" placeholder="Mobile Number" required>
                    <div id="valid" style="color: red;"> </div>
                </div>
                
                <div class="form-group"> 
                    <input id="password" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <small id="emailHelp" class="form-text text-left text-muted">please insert 8 letter password to make it more Strong</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    {{ __('Register') }}
                </button>

                <small id="emailHelp" class="form-text text-muted mt-3">Already Registered?<a href="{{ route('login') }}">{{ __('Login.') }}</a></small>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
