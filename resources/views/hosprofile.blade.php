@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url("../images/loginNew.png");
                background-position: center;
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
        margin-top: 0.7rem;
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
    <table style="margin-top: 70px;width:90%;">
        
        <tr  width="100%">
            <th style="width: 40%;" rowspan="2">
                <div class="containerr">
                <center>
                @if($hospital->photo)
                    <img class="imgg" src="{{asset('images/hospital/' . $hospital->photo)}}"  width="52" height="52px" > 
                    @else
                    <img class="imgg" src="{{ asset('images/hospital.png') }}" width="52" height="52px"> 

                    @endif
                    <h4 style="margin-top: 3px;margin-bottom: 0px; color: black">{{$hospital->name}}</h4>
                    <br>
                    <hr>
                    
                    <span>E-mail :</span>
                    <span style="font-size: 20px;">{{$hospital->email}}</span>
                    <br>

                    <span> Created At :</span>
                    <span style="font-size: 20px;">{{$hospital->created_at}}</span>
                    <br> 
                    
                    <span>Address :</span>
                    <span style="font-size: 20px;">{{$hospital->adress}}</span>
                    <br>

                    <span> Type :</span>
                    <span style="font-size: 20px;">{{$hospital->type}}</span>
                    <br>                    
                    <hr>
                    <form method="get" action="{{ route('editProfileHos', $hospital->id) }}">
                        @csrf
                        <button class="btn mb-3 mt-2">Update</button>
                    </form>
                </center>
                </div>
            </th>
                
            <th class="half">
                <center><h3>IN Hospital Time</h3></center>
                <form method="post" action="{{ route('changeHosTime', $hospital->id) }}">
                @csrf
                <center><input  name="time"  type="text" class="inputBlue" style="width:80%" placeholder="Hospital Time"/></center>
                <center><button class="btn">Update</button></center>
                 
                </form>
                    <center>
                <div class="card mb-3 ml-5" style="background-color:  rgba(80,137,220,0);border:0px;color: #fff;font-weight: normal;">             
                    <div class="card-body">
                       <div>{{$hospital->hosTime}}</div>
                    </div>
                </div>
            </center>
            </th>
        </tr>
        <tr>
        @if($hospital->hasDelivery == 1)  
            <th class="half">
            <center>
                <form   method ="POST" action="{{url('deliverystore')}}" > 
                             @csrf
                <label>Day</label>
                <select name="day" id="types" class="inputBlue" style="text-align: center;width: 80%" >
                                
                              <option value="typee" disabled >Day</option>
                              <option value="Saterday" >Saterday</option>
                              <option value="Sunday">Sunday</option>
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thurasday">Thurasday</option>
                              <option value="Fraiday">Fraiday</option>
                            </select>
                <br>
                <label>From</label>
                <select name="from" id="types" class="inputBlue" style="text-align: center;width: 10%" >
                                
                              <option value="type" disabled>From</option>
                                <option value="12" >12</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                            </select>
               
                <label>To</label>
                <select name="to" id="types" class="inputBlue" style="text-align: center;width: 10%" >
                                
                              <option value="type" disabled>To</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                                <option value="6" >6</option>
                                <option value="7" >7</option>
                                <option value="8" >8</option>
            </select>
                <button class="btn" type="submit">Add</button>
                <button class="btn btn-primary" style="width: inherit;">
                    <a class="linkk" href="{{url('deliveryTimes')}}">Show Delivery Times</a>
                </button>
                  </form>
            </center>

               <center> <table class="table1">                
                   </center>
            </th>
           @endif 
        </tr>
    </table>
</center>
        

@endsection