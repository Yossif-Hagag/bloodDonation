<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Blood Donation' ,'Blood Donation') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('image/icon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body  {
            background-image: url("{{asset('images/dasAdmin.jpg')}}");
            background-position: center;
            background-size: cover;
            /*background-color: #cccccc;*/
            background-repeat: no-repeat;
            padding: 0px;
            margin: 0px;
        }
        .card-header{
            background-color: cadetblue;
        }
        .card{
            width: 50%;
           height= 50%;  
        }
        .inputBlue{
            width: 50%;
            height: 70px;
            color: #707070;
            font-style: normal;
            text-align: left;
            font-size: 25px;
            text-align: center;
            margin-bottom: 35px;
            border: 3px solid #707070;
            border-radius: 5px;
            background-color: rgba(241,232,220,0.8);;
        }
        .btnBlue{
            width: 50%;
            height: 80px;
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
            background-color: #223862;
            margin: 0px;
            padding: 0px;
            position: ;
            text-align: center;
            font-family: sans-serif;
            font-size: 50px;
            color: #ED7D2B
            
        
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                 <a href="{{ url('/') }}"><img src="{{asset('images/Logo.png')}}" style="height: 75px;" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#header-section">Home<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#digital-marketing-section">General&nbsp;Info</a>  
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#feedback-section">Team</a>
                              </li>
                              @if(! auth('web'))
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('home')}}">Needs</a>
                              </li>
                              @endif
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/donorProfile') }}"> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth('web')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @elseauth('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin') }}"> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/adminProfile') }}"> Profile </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth('admin')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @elseauth('hospital')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/hospital') }}"> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/hosprofile') }}"> Profile </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/orders') }}"> Orders </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth('hospital')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">       
                    <div class="col-md-10 ml-5 d-flex justify-content-around">
                        <div class="card mb-5 ml-5">
                            <div class="card-header"> {{$hospital->name}} </div>
                            @if($hospital->photo)
                                <img class="card-img-top" src="{{asset('images/hospital/' . $hospital->photo)}}"/>
                                @else
                                <img class="card-img-top" src="{{asset('images/hospital.png')}}"/>
                               @endif                  
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div><span style="font-size: 16px;font-weight:bold;">Address : </span>{{$hospital->adress}}</div>
                                <div><span style="font-size: 16px;font-weight:bold;">Type : </span>{{$hospital->type}}</div>
                                <div><span style="font-size: 16px;font-weight:bold;">Email : </span>{{$hospital->email}}</div>
                                <div><span style="font-size: 16px;font-weight:bold;">Hospital Time : </span>{{$hospital->hosTime}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>