<!--sign up (mario)-->


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
            background-color:#00AAFF;
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
            <div class="card">
                <div class="card-header" style="background-color:rgba(237,125,44,0.8);color:#fff;">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="number" min='0' step="1" class="form-control @error('birth_date"') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" min='0' step="1" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for= "drink_cohol" class="col-md-4 col-form-label text-md-right">{{ __('Do you drink alcohol') }}</label>

                            <div class="col-md-6"> 
                            <input type="radio" id="cohol_yes" name="drink_cohol"  value="yes">
                                <label for="cohol_yes">yes</label> 
                            <input type="radio" id="cohol_no" name="drink_cohol"  value="no">
                                <label for="cohol_no">no</label> 

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for= "drink_cohol" class="col-md-4 col-form-label text-md-right">{{ __('Do you have chronic diseases') }}</label>

                            <div class="col-md-6"> 
                            <input type="radio" id="cohol_yes" name="chronic_diseases"  value="yes">
                                <label for="cohol_yes">yes</label> 
                            <input type="radio" id="cohol_no" name="chronic_diseases"  value="no">
                                <label for="cohol_no">no</label> 

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                            

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Blood Type') }}</label>

                            <div class="col-md-6">
                               <select class="form-select" aria-label="Default select example" name="selectedBlood" required="">
                                  <option selected value="">Select Your Blood</option>
                                  <option value="1">A</option>
                                  <option value="2">B</option>
                                  <option value="3">AB</option>
                                  <option value="4">O</option>
                                </select>
                            </div>
                        </div>

                       
                       


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:rgba(237,125,44,0.8);border: 0px solid rgba(237,125,44,0.8);">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection