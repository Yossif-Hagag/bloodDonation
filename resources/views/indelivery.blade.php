@extends('layouts.app')

@section('style')
 <style>
    body  {
                background-image: url("{{asset('images/donor.jpg')}}");
                background-size: cover;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            .containerr{
                width: 40%;
                background-color: rgba(210,230,250,0.8);
                border: 2px solid #223862;
                margin-top: 65px;
                box-shadow: 0 10px 15px #223862;
                margin-bottom: 25px;
                border-radius: 15px; 
                float: center;   
            }
            
            .btnBlue{
                cursor: pointer;
                width: 50%;
                height: 60px;
                font-size: 30px;
                text-align: center;
                margin-bottom: 15px;
                border-radius: 3px solid #223862;
                border-radius: 10px;
                background-color: #223862;
                color: white;
            }
            .nav
            {
                width: 100%;
                height:10%;
                background-color: #ED7D2B;
                margin: 0px;
                padding: 0px;
                position: ;
                text-align: center;
                font-family: sans-serif;
                font-size: 30px;
                color: #223862
            }
            span,input
            {
                font-size: 25px;
                padding-right:   5px;
                color: black;
            }
            hr
            {
                
                box-shadow: 0 10px 15px #223862;
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
    <div class="row d-flex justify-content-around">
        <div class="containerr">
        <center><img src="{{ asset('images/chat.png') }}" width=45px height=45px style="display: block"/></center></nav>
        <center>   
            <div>
                <h1 style="color:#223862 ">Delivery Time</h1>   
                <h2 style="color:#223862 ">{{$hospial_name}}</h2>
                <hr>
                 <form method="post" action="{{ route('saveOrder', [$hosid, $post_id, $userId]) }}">
                    @csrf
                    @if($deliverys->isNotEmpty())
                    @foreach($deliverys as $delivery)
                        @if($delivery->hospital_id == $hosid)
                            <span>{{$delivery->day}}
                            <input type="radio" name="radioD" value="{{$delivery->day}} from {{$delivery->from}} to {{$delivery->to}}">{{$delivery->from}} : {{$delivery->to}}<hr></span>
                        @endif
                    @endforeach
                <input type="submit" value="Submit" class="btnBlue"/>
                @else
                    <div class="mb-5" style="color:red;">{{$hospial_name}} Hospital dosen't add deliverys time yet</div>
                @endif
              </form>
            </div>
        </center>
        </div>
    </div>
</div>
@endsection