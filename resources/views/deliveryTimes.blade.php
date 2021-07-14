@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url("../images/loginNew.png");
                background-size: cover;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            .containerr{
                width: 100%;
                background-color: rgba(80,137,220,.7);
                border: 2px solid  #223862;
                border-radius: 15px;
                padding-top: 30px;
                float: right;   
            }
            
            .nav
            {
                width: 100%;
                height:10%;
                background-color: #223862;
                margin: 0px;
                padding: 0px;
                position: ;
                text-align: center;
                font-family: sans-serif;
                font-size: 50px;
                color: #ED7D2B
            }
            .imgg
            {
                display: block;
                margin: 0;
                padding: 0;
                border-radius: 50%;
                width: 130px;
                height: 130px;
                margin-top: -75px;
                border: 2px solid #223862;
            }
            span
            {
                font-size: 25px;
                color: black;
            }
            .btn
            {
                width: 150px;
                height: 50px;
                background-color: #223862;
                color: #FFF;
                border: 2px solid #FFF;
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
                color: #223862;
            }
            th
            {
                font-size: 20px
            }
            .half
            {
                
                width: 90%;
                background-color: rgba(80,137,220,.7);
             
                
                margin-top:5px;
                border-radius: 15px;
            }
            .inputBlue{
                width: 50%;
                height: 50px;
                color: #707070;
                font-style: normal;
                text-align: left;
                font-size: 25px;
                text-align: center;
                margin-bottom: 15px;
                border: 3px solid  #223862;
                border-radius: 5px;
                background-color: white;
            }
            .btnBlue{
                width: 50%;
                height: 80px;
                font-size: 30px;
                text-align: center;
                margin-bottom: 5px;
                border-radius: 3px solid #223862;
                border-radius: 10px;
                background-color: #223862;
                color: white;
            }
             .table1 {
                width: 70%;
                border-collapse: collapse;
                box-shadow: 0 5px 10px #e1e5ee;
                background-color: rgba(80,137,220,.7);
                text-align: left;
                overflow: hidden;
                color: black;
                 margin-bottom: 5px;    
                border-radius: 15px;
                
            }
            .th1 {
                height: 50px;
                box-shadow: 0 5px 10px #e1e5ee;
                text-align: center;
                font-size: 20px;
                font-weight: 900;
                padding: 5px;
                  
              }

              .td1 {
                padding: 1rem 2rem;
              }
            .tr1{
                box-shadow: 0 5px 10px #e1e5ee;
            }
            .linkk{
                color:#000;
            }
            .linkk:hover{
                text-decoration: none;
                color: #fff;
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
        <a class="nav-link" href="{{ url('/hospital') }}"> Dashboard </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/hosprofile') }}"> Profile </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/orders') }}"> Orders </a>
    </li>
@endsection 

@section('content')
     <center> 
        <table class="table1">
            <tr class="tr1">
                <th class="th1" style="font-size:25px;">Day</th>
                <th class="th1" style="font-size:25px;">From</th>
                <th class="th1" style="font-size:25px;">To</th>
                <th class="th1" style="font-size:25px;">Delete</th>
            </tr>
            @foreach ($deliverys as $delivery)
                @if($delivery->hospital_id == $hospital->id)
                <tr class="tr1">
                    <th class="th1">{{ $delivery->day }}</th>
                    <th class="th1">{{ $delivery->from }}</th>
                    <th class="th1">{{ $delivery->to }}</th>
                    <th class="th1">
                        <form method="post" class="del" action="{{ route('deleteDelivery', $delivery->id) }}">
                            @csrf
                            <button class="btn" type="submit">  Delete  </button>
                        </form>
                    </th>
                </tr>
                @endif
            @endforeach
        </table>
    </center>
@endsection
