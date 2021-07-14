@extends('layouts.app')

@section('style')
<style>
    body  {
                background-image: url("images/donor.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            .containerr{
                width: 100%; 
              
              margin-right: 30px;
               
                background-color: rgba(210,230,250,0.6);
                border: 2px solid #FA9746;
                margin-top: 15px;
                margin-bottom: 25px;
                border-radius: 15px;
                color: wheat;
                font-size: 35px;
                   
            }
            .container2{
              
              
               
               
                background-color: rgba(210,230,250,0.6);
                border: 2px solid #FA9746;
                margin-top: 15px;
                margin-bottom: 25px;
                border-radius: 15px;
                color: black;
                font-size: 35px;
                   
            }
           
            .imgUser
            {
                display: block;
                margin: 0;
                padding: 0;
                border-radius: 50%;
                width: 130px;
                height: 130px;
                margin-top: -75px;
                border: 2px solid #FA9746;
            }
            span
            {
                font-size: 20px;
                color: black;
            }
            .btn
            {
                width: 150px;
                height: 50px;
                background-color: #FA9746;
                border: 2px solid #FA9746;
                color: black;
                font-size: 20px;
                border-radius: 2px
                
            }
            .btn:hover
            {
                border-radius: 8px;
            }
            hr
            {
                color: #FA9746;
            }
            th
            {
                font-size: 20px
            }
            .stat
            {
                width: 90%;
                height: 130px;
                background-color: rgba(237,125,44,0.8);
                vertical-align: middle;
                padding: 20px;
                border: 2px solid black;
                border-radius: 5px;
                color: #FFF;
            }

    .paginate{
            display:flex;
            justify-content:space-around;
        }
        .nav-item{
            margin-top: 0.38rem;
        }
        .dropdown{
            margin-top: 0px;
        }
        
</style>
@endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/donorProfile') }}"> Dashboard </a>
    </li> 
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
    </li> 
@endsection

@section('content')
        <center>
            <table style="width:100%; padding: 15px">
                <tr style="width: 100%;margin-bottom: 5px">
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of posts that donated
                                    <br>
                                    <h1>
                                        @if($a)
                                            {{ $a }}
                                        @else 
                                            0
                                        @endif
                                    </h1>
                                </div>
                            </center></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of posts donated in hospital
                                    <br>
                                    <h1>
                                        @if($h)
                                            {{ $h }}
                                        @else
                                            0
                                        @endif
                                    </h1>
                                </div>
                            </center></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of posts donated by delivery
                                    <br>
                                    <h1>
                                        @if($d)
                                            {{ $d }}
                                        @else
                                            0
                                        @endif
                                    </h1>
                                </div>
                            </center></th>                        
                    </tr>
            </table>
            <br>
            <br>
           
            <br>
        </center>
            <center>
             <table style="width: 90%">
                 <tr style="width: 100%">
                    <th style="width: 35%;">
                        <div class="containerr">
                        <center>
                            @if($donor->photo)
                                <img src="{{asset('images/donors/' . $donor->photo)}}" width="100%" height="100%"class="imgUser" />
                            @else
                                <img src="{{asset('images/user.png')}}" width="100%" height="100%"class="imgUser" />
                            @endif
                            <h4 style="margin-top: 2px;margin-bottom: 0px; color: black">{{ $donor->name }}</h4>
                            <hr>
                            <span style="font-size:22px;">E-mail :</span>
                            <span>{{ $donor->email }}</span>
                            <br>
                            <span style="font-size:22px;">Phone :</span>
                            <span>{{ $donor->phone }}</span>
                            <br>
                            <span style="font-size:22px;">Address :</span>
                            <span>{{ $donor->address }}</span>
                            <br>
                            <span style="font-size:22px;">Age :</span>
                            <span>{{ $donor->birth_date }}</span>
                            <br>
                            <span style="font-size:22px;">Blood type :</span>
                            <span>
                                @foreach ($bloods as $blood)
                                    @if($blood->id == $donor->blood_id)
                                        {{ $blood->bloodtype }}
                                    @endif
                               @endforeach
                            </span>
                            <hr>
                            <form method="get" action="{{ route('editProfileUser', $donor->id) }}">
                                @csrf
                                <button class="btn mb-3" type="submit">  Update  </button>
                            </form>
                        </center>
                        </div>
                        </th>
                     <th>
                        <div style="width: 100%;margin-left: 20px;" class="container2">
                            <center><h4  style="margin-top: 0px;margin-bottom: 0px; color: black">History</h4></center>
                            <hr>
                            <center>
                                <table>
                                    <tr>
                                        <th style="width: 28%">Date</th>
                                        <th style="width: 25%">Hospital</th>
                                        <th style="width: 10%">Post</th>
                                    </tr>
                                    @foreach ($donates as $donate)
                                        <tr>
                                            <th style="width: 25%">{{$donate->created_at}}</th>
                                            <th style="width: 25%">
                                                @if(!!$donate->posts)
                                                    @if(!!$donate->posts->hospial)
                                                        {{$donate->posts->hospial->name}}
                                                    @else
                                                        Not Found !
                                                    @endif
                                                @else
                                                    Not Found !
                                                @endif
                                            </th>
                                            <th style="width: 25%">
                                                <a href="{{route('viewPostDonated', $donate->post_id)}}">View Post</a>
                                            </th>
                                        </tr>
                                    @endforeach             
                                </table>
                            </center>
                        </div>
                    </th>
                 </tr>
                 </table>
        </center>
@endsection