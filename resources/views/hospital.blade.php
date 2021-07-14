@extends('layouts.app')

@section('style')
<style>
    body  {
                background-image: url("{{asset('images/dasAdmin.jpg')}}");
                background-size: cover;
                background-clip:content-box;
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            .containerr{
                width: 100%;
                height: 0px;
                text-align: center;
                vertical-align: middle;
                background-color: #323757;
                border-radius: 0px;
                color: wheat;
                font-size: 35px;
                   
            }
           
            .element
            {
                width: ;
                height: 250px;
                background-color: rgba(80,137,220,.8);
                margin-left: 20px;
                margin-bottom:-75px;
                border-radius: 5px;
            }
            .elementEnd
            {
                width: 20%;
                height: 150px;
                background-color: white;
                margin-right: 20px;
                
            }
            .bouncy{
                 animation:bouncy 5s infinite linear;
                 position:relative;
                }
                @keyframes bouncy {
                 0%{top:0em}
                 40%{top:0em}
                 43%{top:-0.9em}
                 46%{top:0em}
                 48%{top:-0.4em}
                 50%{top:0em}
                 100%{top:0em;}
                } 
           a.button1{
                 display:inline-block;
                 padding:0.35em 1.2em;
                 border:0.1em solid #FFFFFF;
                 margin:0 0.3em 0.3em 0;
                 color: wheat;
                 width:300px;
                 border-radius:0.12em;
                 box-sizing: border-box;
                 text-decoration:none;
                 font-family:'Roboto',sans-serif;
                 font-weight:300;
                 background-color:  rgba(80,137,220,.8);
                 text-align:center;
                 transition: all 0.2s;
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
<div style=""id="" class="containerr">
    <center>
    <table width="90%">
       
         <tr width="100%">
           
            <th>
                <div class="element">
                    <table>
                        <tr>
                            <h2 class="stat d-flex justify-content-around">Number of orders</h2>
                        </tr>
                        <tr style="padding-top:70px;"><h2 class="d-flex justify-content-around mt-5" style="font-weight:900;">
                            @if($o)
                                {{$o}}
                            @else
                                0
                            @endif
                        </h2></tr>
                    </table>
                </div>
             </th>
            <th>
                <div class="element">
                    <table>
                        <tr>
                            <h2 class="stat d-flex justify-content-around">Number of donors</h2>
                        </tr>
                        <tr style="padding-top:70px;"><h2 class="d-flex justify-content-around mt-5" style="font-weight:900;">
                            @if($d)
                                {{$d}}
                            @else
                                0
                            @endif
                        </h2></tr>
                    </table>
                </div>
             </th>
             <th>
                <div class="element">
                    <table>
                        <tr>
                            <h2 class="stat d-flex justify-content-around">Number of posts</h2>
                        </tr>
                        <tr style="padding-top:70px;"><h2 class="d-flex justify-content-around mt-5" style="font-weight:900;">
                            @if($p)
                                {{$p}}
                            @else
                                0
                            @endif
                        </h2></tr>
                    </table>
                </div>
             </th> 
             <th>
                <div class="element">
                    <table>
                        <tr>
                            <h2 class="stat d-flex justify-content-around">Number of delivery</h2>
                        </tr>
                        <tr style="padding-top:70px;"><h2 class="d-flex justify-content-around mt-5" style="font-weight:900;">
                            @if($dt)
                                {{$dt}}
                            @else
                                0
                            @endif
                        </h2></tr>
                    </table>
                </div>
             </th>
                
        </tr>
        </table>
        <br>
        <br>
        <br>
        <center>
        <table style="width:90%;margin-top: 150px">
        <tr width="100%">
           <a href="{{ url('/createpost') }}" class="button1 bouncy">Add Post</a>
            <a href="{{ url('/viewposts') }}" class="button1 bouncy" style="animation-delay:0.07s">View Posts</a>
            <a href="{{ url('/viewdonors') }}" class="button1 bouncy" style="animation-delay:0.14s">View Donors</a>
        </tr>
     
    </table>
    </center>
    </center>
</div>
</center>
@endsection
