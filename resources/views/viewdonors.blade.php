@extends('layouts.app')

@section('style')
<style>
	 body  {
                background-image: url("{{asset('images/dasAdmin.jpg')}}");
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
            
            
            table {
                border-collapse: collapse;
                box-shadow: 0 5px 10px #e1e5ee;
                background-color: rgba(80,137,220,.7);
                text-align: left;
                overflow: hidden;
                color: black;
                border-radius: 15px;
                
            }
            th {
                height: 50px;
                box-shadow: 0 5px 10px #e1e5ee;
                text-align: center;
                font-size: 20px;
                font-weight: 900;
                padding: 5px;
                  
              }

              td {
                padding: 1rem 2rem;
              }
            tr{
                box-shadow: 0 5px 10px #e1e5ee;
            }
            .status
            {
                cursor: pointer;
            }
            .red{
                color: red;
            }
            .green{
                color: green;
            }
            .imgg{
                width: 52px;
                height: 52px;
                border-radius: 50%;
                border: 2px solid black;
            }
	.paginate{
            display:flex;
            justify-content:space-around;
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
            <div style=""id="" class="container">
                <center>
               <table>
                    <thead>
                        <tr>
                            <th style="font-size:18px;">Name</th>
                            <th style="font-size:18px;">Image</th>
                            <th style="font-size:18px;">Email</th> 
                            <th style="font-size:18px;"> Phone</th>
                            <th style="font-size:18px;"> address </th>
                            <th style="font-size:18px;"> age</th>
                            <th style="font-size:18px;"> Blood Type</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr> 
                            <td>{{ $user->name }}</td>
                            
                            <td>
                            @if($user->photo)
                            <img class="imgg" src="{{ asset('images/donors/' . $user->photo) }}" width="52" height="52px"> 
                            @else
                            <img src="{{ asset('images/user.png') }}" width="52" height="52px"> 

                            @endif
                            </td>
                            <td> {{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>
                            @foreach ($bloods as $blood)
                                @if($blood->id == $user->blood_id)
                                    <div>{{ $blood->bloodtype }}</div>
                                @endif
                           @endforeach
                       </td>                           
                    @endforeach
                </table>   
                </center>
            </div>
        </center>
@endsection