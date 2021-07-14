@extends('layouts.app')



@section('style')
<style>
body  {
        background-image: url("images/loginNew.png");
        background-size: cover;
        background-repeat: no-repeat;
        padding: 0px;
        margin: 0px;
        }
        .card{
            border: 2px solid rgba(237,125,44,0.8);
        }
        .card-header{
            background-color:rgba(237,125,44,0.8);
            color:white;
            font-size:20px;

        }
        .card-body{
            background-color:#E6E6FF; 
        }
        .choose{
            margin-top:10px;
        }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(app('request')->input('alert') && app('request')->input('alert') == 1)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Sorry your account is disabled !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Donor Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: rgba(237,125,44,0.8);border: 0px solid rgba(237,125,44,0.8);">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:rgba(237,125,44,0.8);">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div style=" text-align:center;">
                        <label style="color: #223862;font-size: 15px;">haven't account yet ?</label>
                        <a href="{{ route('register') }}" style="font-style: oblique;color: #223862;font-size: 15px;">Register Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection