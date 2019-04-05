@extends('layouts.app')

@section('mainTitle') Login-Hajurko Property @endsection

<style>
    body{
        background-image: url('images/log.jpg');
        background-position: top ;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .mainc{
        margin-buttom: 20px;
    }
    .formCointainer{
        border-radius: 7px;
        padding: 15px;
        box-shadow: 0px 0px 12px 0px;
    }
    .bg{
        position: relative;
        margin : 0 0 15px 0;
    }
</style>

@section('content')
<div class="container mainc">
    <div class="row">
      <div class="col-lg-6 text-dark">
        <h2 class="mt-5 text-center text-underline">Login to our community</h2>
        <p >Login to take full advantage of all the great deals on property. You can also use variety of features from hajurko property</strong></p>
      </div>
      <div class="col-lg-6 ">
        <div class="card text-center text-white mt-5 formCointainer">
          <div class="card-heading bg-info">
            <h2>{{ __('Login') }}</h2>
            <p>Insert user name and password to login</p>
          </div>
          <div class="card-body cbody ">
            <form method="POST" action="{{ route('login') }}">   
                @csrf
                <img class="bg" src="images/man1.png" alt="userlogo">
 
                <div class="form-group">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Username" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row ml-2">                       
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-dark" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class=" offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a> <br>
                        @endif
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Register?') }}
                        </a>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
