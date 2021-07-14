@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url("../images/dash2.jpg");
                
                background-size: cover;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
             .containerr{
                width: 100%;
              
              margin-right: 30px;
               
                background-color: rgba(255,85,105,0.7);
                border: 2px solid rgba(195,6,46,01);
                margin-top: 65px;
                margin-bottom: 25px;
                border-radius: 15px;
                color: black;
                font-size: 35px;
                   
            }
           
            
           .adminImg
            {
                display: block;
                margin: 0;
                padding: 0;
                border-radius: 50%;
                width: 130px;
                height: 130px;
                margin-top: -75px;
                border: 2px solid rgba(195,6,46,1);
            }
             .btn
            {
                width: 150px;
                height: 50px;
                background-color: rgba(195,6,46,1);
                border: 2px solid rgba(195,6,46,1);
                color: white;
                font-size: 20px;
                border-radius: 2px
                
            }
            .btn:hover
            {
                border-radius: 8px;
            }
            hr
            {
                color: rgba(195,6,46,0.8);
            }
            th
            {
                font-size: 20px
            }
            span{
                font-size: 22px;
            }
            .nav-item{
        margin-top: 0.5rem;
        }
        .dropdown{
            margin-top: 0px;
        }

        </style>
        @endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}"> Dashboard </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/adminProfile') }}"> Profile </a>
    </li>
@endsection

@section('content')
<center>
             <table style="width: 40%">
                 <tr style="width: 100%">
                    <th style="width: 100%;">
                        <div class="containerr">
                        <center>
                        @if($admin->photo)
                            <img class="adminImg" src="{{asset('images/admins/' . $admin->photo)}}" alt="User Photo" width="100%" height="100%" />
                        @else
                            <img class="adminImg" src="{{asset('images/user.png')}}" alt="User Photo" width="100%" height="100%" />
                        @endif
                            <h4 style="margin-top: 3px;margin-bottom: 0px; color: ">{{ $admin->name }}</h4>
                            <hr style="background-color:white">
                            <span style="font-size:26px;">E-mail :</span>
                            <span>{{ $admin->email }}</span>
                            <br>
                            <span style="font-size:26px;">Created At :</span>
                            <span>{{ $admin->created_at }}</span>
                            <br>
                            <span style="font-size:26px;">Phone :</span>
                            <span>{{ $admin->phone }}</span>
                            <br>   
                            <hr style="background-color:white">
                            <form method="get" action="{{ route('editProfileAdmin', $admin->id) }}">
                            @csrf
                            <button class="btn mb-3">Update</button>
                            </form>
                        </center>
                        </div>
                        </th>
                     <th>
                        
                    </th>
                 </tr>
                 </table>
        </center>
     
     
        

@endsection