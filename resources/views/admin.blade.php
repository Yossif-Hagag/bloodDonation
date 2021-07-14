@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url("../images/dash2.jpg");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            .container{
                width: 100%;
                margin-top: 15px;
            }
           
           
            img
            {
                display: block;
                margin: 0;
                padding: 0;
            }
        
            .stat
            {
                width: 100%;
                height: 100px;
                background-color: rgba(195,6,46,0.8);
                border-radius: 5px;
                vertical-align: middle;
                padding: 20px;
                border: 2px solid #2D4778;
                border-radius: 50%;
                color: #FFF;
            }
            /buttons/
            .wrapper{
                position: ;
                top:50%;
               
              
                width: fit-content;
                height:auto;
            }
            button{
                 
                width:200px;
                height:70px;
                background: linear-gradient(to left top, #2D4778 50%, #324F84 50%);
                border-style: none;
                color:#fff;
                font-size: 23px;
                letter-spacing: 3px;
                font-family: 'Lato';
                font-weight: 600;
                outline: none;
                cursor: pointer;
                position: relative;
                padding: 0px;
                overflow: hidden;
                transition: all .5s;
                box-shadow: 0px 1px 2px rgba(0,0,0,.2);
            }
            button span{
                position: absolute;
                display: block;
            }
            button span:nth-child(1){
                height: 3px;
                width:200px;
                top:0px;
                left:-200px;
                background: linear-gradient(to right, rgba(0,0,0,0), #C3062E);
                border-top-right-radius: 1px;
                border-bottom-right-radius: 1px;
                animation: span1 2s linear infinite;
                animation-delay: 1s;
            }

            @keyframes span1{
                0%{
                    left:-200px
                }
                100%{
                    left:200px;
                }
            }
            button span:nth-child(2){
                height: 70px;
                width: 3px;
                top:-70px;
                right:0px;
                background: linear-gradient(to bottom, rgba(0,0,0,0), #C3062E);
                border-bottom-left-radius: 1px;
                border-bottom-right-radius: 1px;
                animation: span2 2s linear infinite;
                animation-delay: 2s;
            }
            @keyframes span2{
                0%{
                    top:-70px;
                }
                100%{
                    top:70px;
                }
            }
            button span:nth-child(3){
                height:3px;
                width:200px;
                right:-200px;
                bottom: 0px;
                background: linear-gradient(to left, rgba(0,0,0,0), #C3062E);
                border-top-left-radius: 1px;
                border-bottom-left-radius: 1px;
                animation: span3 2s linear infinite;
                animation-delay: 3s;
            }
            @keyframes span3{
                0%{
                    right:-200px;
                }
                100%{
                    right: 200px;
                }
            }

            button span:nth-child(4){
                height:70px;
                width:3px;
                bottom:-70px;
                left:0px;
                background: linear-gradient(to top, rgba(0,0,0,0), #C3062E);
                border-top-right-radius: 1px;
                border-top-left-radius: 1px;
                animation: span4 2s linear infinite;
                animation-delay: 4s;
            }
            @keyframes span4{
                0%{
                    bottom: -70px;
                }
                100%{
                    bottom:70px;
                }
            }

            button:hover{
                transition: all .5s;
                transform: rotate(-3deg) scale(1.1);
                box-shadow: 0px 3px 5px rgba(0,0,0,.4);
            }
            button:hover span{
                animation-play-state: paused;
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
 

        <div class="container">
                <span>
               <table style="width:100%; padding: 15px">
                    <tr style="width: 100%;margin-bottom: 5px">
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of hospitals
                                    <h1> <center>
                        @if($h)
                            {{$h}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                            </center></th>
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div style="margin-top: -50px;"class="wrapper">
                                  <button>
                                  <a href="{{ url('/addHospital') }}" style="text-decoration: none;">Add Hospital</a>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </button>
                                </div>    
                            </center>
                        </th>
                    </tr>
                    <tr style="width: 100%;margin-bottom: 5px">
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of posts
                                    <h1> <center>
                        @if($p)
                            {{$p}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                                
                            </center>
                        </th>
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of admins
                                    <h1> <center>
                        @if($a)
                            {{$a}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                                
                            </center></th>
                         <th style="width: 25%">
                            <center>
                                <div style="margin-top: -50px;"class="wrapper">
                                  <button>
                                  <a href="{{ url('/hosList') }}" style="text-decoration: none;">Hospital List</a>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </button>
                                </div>    
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of donors
                                    <h1>  <center>
                        @if($d)
                            {{$d}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                                
                            </center></th>
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of orders
                                    <h1>  <center>
                        @if($o)
                            {{$o}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                                
                            </center></th>
                         <th style="width: 25%">
                            <center>
                                <div style="margin-top: -50px;"class="wrapper">
                                  <button>
                                  <a href="{{ url('/addAdmin') }}" style="text-decoration: none;">Add Admin</a>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </button>
                                </div>    
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div class="stat">Number of posts that have donated
                                    <h1><center>
                        @if($pd)
                            {{$pd}}
                        @else
                            0
                        @endif
                    </center></h1>
                                </div>
                                
                            </center></th>
                        <th style="width: 25%"></th>
                        <th style="width: 25%">
                            <center>
                                <div style="margin-top: -50px;"class="wrapper">
                                  <button>
                                  <a href="{{ url('/allAdmins') }}" style="text-decoration: none;"> All Admins</a>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </button>
                                </div>    
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 25%"></th>
                        <th style="width: 25%"></th>
                        <th style="width: 25%"></th>
                         <th style="width: 25%">
                            <center>
                                <div style="margin-top: -10px;"class="wrapper">
                                  <button>
                                  <a href="{{ url('/allUsers') }}" style="text-decoration: none;"> All Donors</a>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </button>
                                </div>    
                            </center>
                        </th>
                    </tr>
                    
                </table>
                    </span>
                
                
                
            </div>
       
 @endsection