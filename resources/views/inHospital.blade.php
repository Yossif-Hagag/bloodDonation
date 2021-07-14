@extends('layouts.app')

@section('style')
<style>
   body  {
                background-image: url("{{asset('images/donor.jpg')}}");
                background-size: cover;
                /*background-color: #cccccc;*/
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            
            .container2{
                background-color: rgba(210,230,250,0.8);
                border: 2px solid #223862;
                margin-top: 35px;
                margin-bottom: 25px;
                border-radius: 15px;
                color: black;
                font-size: 35px;
                vertical-align: middle;
                   
            }
           
    
            span
            {
                font-size: 25px;
                color: black;
            }
            
            
            th
            {
                font-size: 20px
            }
            table {
                border-collapse: collapse;
                box-shadow: 0 5px 10px #223862;
                text-align: left;
                overflow: hidden;
                color: black;
                border-radius: 15px;
            }
              thead {
                box-shadow: 0 5px 10px #223862;
              }

              th {
                  box-shadow: 0 5px 10px #223862;
                padding: 1rem 2rem;
                
                letter-spacing: 0.1rem;
                font-size: 25px;
                font-weight: 900;
                  
              }

              td {
                padding: 1rem 2rem;
              }
            tr{
                box-shadow: 0 5px 10px #223862;
                text-align: center;
            }

              .status {
                border-radius:  0.2rem;
                background-color: ;
                padding: 0.2rem 1rem;
                text-align: center;
            }
            .nav-item{
        margin-top: 0.8rem;
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
<div class="container">
   <div class="row">
    <div>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            You have book for donation in <strong>{{$hospital->name}}</strong> Hospital successfully !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <center style="width: 100%;">
            <div style="width: 100%;margin-left:" class="container2">
                <center>
                    <table style="width: 100%; font-style: normal">
                        <tr>
                            <th style="min-width: 30%">{{$hospital->name}}</th>
                            <th style="min-width: 70%">{{$hospital->adress}}</th>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <h2>{{$hospital->hosTime}}</h2>
                            </th>  
                        </tr>                      
                    </table>
                </center>
            </div>     
        </center>
    </div>
  </div>    
</div>

@endsection