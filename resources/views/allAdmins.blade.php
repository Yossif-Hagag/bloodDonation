@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url("../images/dash2.jpg");
                background-position: center;
                background-size: cover;
                /background-color: #cccccc;/
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            
            .containerr{
                width: 80%;
               
                text-align: center;
                vertical-align: middle;
                
                background-color: rgba(56,90,100,0.6);
               
                margin-top: 15px;
                margin-bottom: 25px;
                border-radius: 15px;
                color: wheat;
                font-size: 35px;
                   
            }
           
            
            .imgg
            {
                display: block;
                margin: 0;
                padding: 0;
                border-radius:50%;
            }
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            *,
            *::before,
            *::after {
              box-sizing: border-box;
              margin: 0;
              padding: 0;
            }
            .button {
              background-color: #4CAF50; /* Green */
              border: none;
              color: wheat;
              padding: 16px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              transition-duration: 0.4s;
              cursor: pointer;
                border-radius: 7px;
            }

            .button1 {
              background-color: white; 
              color: black; 
              border: 3px solid #4CAF50;
            }

            .button1:hover {
              background-color: #4CAF50;
              color: white;
            }

            .button2 {
              background-color: white; 
              color: black; 
              border: 3px solid  #223862;
            }

            .button2:hover {
              background-color:  #223862;
              color: white;
            }

            .button3 {
              background-color: white; 
              color: black; 
              border: 3px solid #f44336;
            }

            .button3:hover {
              background-color: #f44336;
              color: white;
            }
           

            table {
              border-collapse: collapse;
              box-shadow: 0 5px 10px #e1e5ee;
              background-color: rgba(195,6,46,0.7);
              text-align: left;
              overflow: hidden;
                color: white;
              width: 100%;
                border-radius: 15px;
            }
              thead {
                box-shadow: 0 5px 10px #e1e5ee;
              }

              th {
                padding: 1rem 2rem;
                text-transform: uppercase;
                letter-spacing: 0.1rem;
                font-size: 25px;
                font-weight: 900;
                  
              }

              td {
                padding: 1rem 2rem;
                text-transform: uppercase;
                letter-spacing: 0.1rem;
                font-size: 16px;
                font-weight: 900;
              }
            tr{
                box-shadow: 0 5px 10px #e1e5ee;
            }

              .status {
                border-radius:  0.2rem;
                background-color: ;
                padding: 0.2rem 1rem;
                text-align: center;
            }
              
              .amount {
                text-align: right;
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
            <div style=""id="" class="container">
               <table>
                    <thead>
                        <tr>
                            <th style="font-size:22px;">Name</th>
                            <th style="font-size:22px;">Image</th>
                            <th style="font-size:22px;">Email</th> 
                            <th style="font-size:22px;"> Phone</th>
                             
                            

                        </tr>
                    </thead>
                    @foreach($admins as $admin)
                        <tr> 
                            <td>{{ $admin->name }}</td>
                            
                            <td>
                            @if($admin->photo)
                            <img class="imgg" src="{{asset('images/admins/' . $admin->photo)}}"  width="52" height="52px" > 
                            @else
                            <img src="{{ asset('images/user.png') }}" width="52" height="52px"> 

                            @endif
                            </td>
                            <td> {{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                        </tr>      
                    @endforeach
                </table>   
            </div>
        </center>
     
        

 @endsection