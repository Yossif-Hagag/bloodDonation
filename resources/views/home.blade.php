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
 

    .paginate{
            display:flex;
            justify-content:space-around;
        }

body {
      background-image: url("images/donor.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      padding: 0px;
      margin: 0px;
      font-family: "Segoe UI", Helvetica, Arial, Helvetica, sans-serif;
}


.NO{
border:none;
font-size: 20px;
font-weight:bold;
background-color: rgba(0, 0, 0, 0);
color: black;
}

.NO:hover {
  text-decoration: underline;
  background-color: rgba(0, 0, 0, 0);
  color: black;
}

.btn-danger:not(:disabled):not(.disabled).active, .btn-danger:not(:disabled):not(.disabled):active, .show>.btn-danger.dropdown-toggle {
    color: red;
    background-color: #fff;
    border: none;
    text-decoration: underline;
  }
/*
a mlink {
  text-decoration: none;
  color: inherit;
  font-size: 2rem;
}

*/

/***************
 * POST HEADER * 
 ***************/
.disable{
height: 35px;
width: 35px;
margin-top: 20px;

}
.post {
  background: rgba(50,55,85,0.5);
  border:2px solid #000 ;
  margin-left:119px;
  width: 80%;
  max-width: 50rem;
  max-height: 30rem;
  border-radius: 1rem;
  box-shadow: 0 0.1rem 0.2rem var(--box-shadow);
}

.post__header {
  display: flex;
  justify-content: space-between;
  padding: 1.2rem 1.6rem 0 1.6rem;
}

/* Header left */
.header__left {
  flex: 1;
}

.author__name:hover,{
  text-decoration: underline;
}

.author__name {
  margin-right: 0.2rem;
}

.post__author-pic {
  float: left;
  width: 5rem;
  height: 5rem;
  margin-right: 0.8rem;
  border-radius: 50%;
  border: 2px solid #000;
  box-shadow: 0 0.2rem 0.4rem var(--box-shadow);
  transition: filter 0.2s ease;
  cursor: pointer;
}

.post__author-pic:hover {
  filter: brightness(0.8);
}

.post__author {
  font-size: 1rem;
  font-weight: 600;
  color: var(--black2);
}

.post__date {
  display: block;
  float: left;
  font-size: 0.8rem;
  color: var(--black1);
}

/* Header right */


.options__icon {
  height: 1rem;
  width: 1rem;
  position: relative;
  background-size: 3.4rem 30rem;
  background-position: -2.2rem -24rem;
  opacity: 0.6;
}

/****************
 * POST CONTENT * 
 ****************/

.content__paragraph {
  font-size: 2rem;
  padding: 0rem 1.6rem 0rem 1.6rem;
}


/***************
 * POST FOOTER * 
 ***************/

/* REACTIONS */
.footer__reactions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.8rem 1.6rem;
  color: var(--reactions-links);
  font-size: 2rem;
}

.reactions__emojis {
  display: flex;
  align-items: center;
}

.emojis__like {
  width: 52px;
  height: 52px;
  position: relative;
}

.emojis__like {
  z-index: 2;
}



/* BUTTONS (LIKE, COMMENT, SHARE) */

.modal-body{
  color: #000;
  font-size: 16px;
}

.wait{
      background-color:black;
      color:#fff;
      height:36px;
      text-align:center;
      border-radius: .25rem;
      font-size: 20px;
      padding-right: 5px;
      padding-left: 5px;
      cursor: auto;
      font-weight: 400;
  }

   .button1{
                 display:inline-block;
                font-size: 20px;
                 border:.10em solid #000;
                 margin:0 0.3em 0.3em 0;
                 border-radius:0.12em;
                 box-sizing: border-box;
                 text-decoration:none;
                 font-weight:600;
                 color:#000;
                 text-align:center;
                 transition: all 0.2s;
                width: 250px;
                height: 40px;
                background-color: rgba(0, 0, 0, 0);
                vertical-align: middle;
                cursor: pointer;
                }
                .button1:hover{
                 color:#fff;
                 background-color:#000;
                    border-color: white;
                }

      .button12{
                 display:inline-block;
                font-size: 16px;
                 border:.10em solid #000;
                 margin:0 0.3em 0.3em 0;
                 border-radius:0.12em;
                 box-sizing: border-box;
                 text-decoration:none;
                 font-weight:600;
                 color:#000;
                 text-align:center;
                 transition: all 0.2s;
                width: 200px;
                height: 40px;
                background-color: rgba(0, 0, 0, 0);
                vertical-align: middle;
                cursor: pointer;
                }
                .button12:hover{
                 color:#fff;
                 background-color:#000;
                    border-color: white;
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
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#header-section">Home<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#digital-marketing-section">General&nbsp;Info</a>  
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}#feedback-section">Team</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('home')}}">Needs</a>
                              </li>                                    
                                @if(! auth()->user())
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('chooseLogin') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#header-section">Home<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#digital-marketing-section">General&nbsp;Info</a>  
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#feedback-section">Team</a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/donorProfile') }}"> Dashboard </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
                            </li> 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
    <div class="row">
      @foreach ($posts as $post)
        <div class="col-md-10 ml-5 mb-5">
        <div class="post">
           @foreach ($hospitals as $hospital)
              @if($post->hospital_id == $hospital->id && $post->hospital_id != NULL)
                <!-- POST HEADER -->
                <div class="post__header header">
                  <!-- header left -->
                  <div class="header__left">
                    <a href="{{ url('/choosenHosprofile', $hospital->id) }}"><img src="images/hospital/{{$hospital->photo}}" class="post__author-pic"/></a>
                    <div class="post__author author">
                      <span class="author__name">
                        <a class="mlink" style="color: #000;" href="{{ url('/choosenHosprofile', $hospital->id) }}"><h1>{{$hospital->name}}</h1></a>
                      </span>
                      <i class="author__verified"></i>
                    </div>
                    <span class="post__date" style="font-size:18px;margin-top: -25px">{{$post->created_at}}</span>
                  </div>
                  <!-- Header right -->
                  <div class="header__right">
                    <div class="post__options options">
                      <i class="options__icon"></i>
                    </div>
                  </div>
                </div>
                <div class="mt-2" style="width:100%;background-color: #fff;height: 2px;"></div>
                <!-- POST CONTENT -->
                <div class="post__content content">
                  <p class="content__paragraph" style="color: #fff;font-weight: bold;">
                      <span style="font-size:22px;">Blood Type</span> &nbsp; : &nbsp;{{$post->title}}<br><span style="font-size:22px;">B o d y</span> &nbsp;: &nbsp;{{$post->body}}
                  </p>
                </div>
                <div style="width:100%;background-color: #fff;height: 3px;"></div>
                <!-- POST FOOTER -->
                <div class="post__footer footer">
                    <!-- Reactions -->
                    <div class="footer__reactions reactions">
                      <div class="reactions__emojis emojis">
                          <span class="emojis__count">
                            @foreach($donates as $donate)
                              @if($post->id == $donate->post_id && $donate->post_id != NULL && $donate->user_id != NULL)
                                @php
                                  $x = $x + 1;
                                @endphp
                              @endif
                            @endforeach
                            <button class="btn btn-danger mr-2 NO" type="button" data-toggle="modal" data-target="#demoModal-{{$post->id}}">{{$x}}</button>

                              <div class="modal fade" id="demoModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color:#e3342f;">
                                      <h4 style="color:#fff;">Donors For This Post</h3>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      @if($x == 0)
                                        Donors haven't donate in this post yet !
                                      @endif

                                      @foreach($donates as $donate)
                                        @foreach($users as $user)
                                           @if($post->id == $donate->post_id && $user->id == $donate->user_id && $donate->user_id != NULL && $donate->post_id != NULL)
                                           <div class="m-3 p-3">
                                              <div class="header__left">
                                                <a href="{{ url('/choosenDonerprofile', $user->id) }}"><img src="images/donors/{{$user->photo}}" class="post__author-pic"/></a>
                                              </div>
                                              <div class="mt-4">
                                                <a class="mlink" href="{{ url('/choosenDonerprofile', $user->id) }}">{{$user->name}}</a>
                                              </div>
                                            </div>
                                           @endif
                                        @endforeach
                                      @endforeach
                                    </div>
                                    <div class="modal-footer d-flex justify-content-around">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @php
                              $x = 0;
                            @endphp
                        </span>
                        @if($post->disable == 0)
                          <img src="images/Donate.png" class="emojis__like" />
                        @else
                          <img src="images/disable.png" class="emojis__like" />
                        @endif
                      </div>
                        <br>
                      <div class="">
                        
                            @if(auth('web')->user() && $post->disable == 0)
                              <div class="d-flex justify-content-between">
                                <form method="post" action="{{ route('inHospital', $post->id) }}">
                                   @csrf
                                   <button class="button12 mr-5" type="submit">Donate In Hospital</button>
                                </form>
                                @if($hospital->hasDelivery == 1)
                                  <form method="get" action="{{ route('indelivery', $post->id) }}">
                                     @csrf
                                     <button class="button12" type="submit">Donate By Delivery</button>
                                  </form>
                                @endif
                              </div>
                            @elseif(auth('web')->user() && $post->disable == 1)
                              <div class ="wait">
                                <p> This Post is Disabled Now </p>
                              </div>
                            @else
                              @if($post->disable == 0)
                                <button class="button1" type="button" data-toggle="modal" data-target="#demoModal1-{{$post->id}}">Donate</button>

                                <div class="modal fade" id="demoModal1-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          If you want to donate Please, login First Or Create an Account
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-success">
                                          <a href="{{ route('login', [ 'id' => $post->id ] ) }}" style="color:#fff;text-decoration: none;">Login</a>
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                          <a href="{{ route('register') }}" style="color:#fff;text-decoration: none;">Register</a>
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @else
                                <div class ="wait">
                                  <p> This Post is Disabled Now </p>
                                </div>
                              @endif
                            @endif
                     
                      </div>
                    </div>   
                  </div>
          @endif
        @endforeach
        </div>
    </div>
    @endforeach
</div>
<div class = "paginate">{{$posts->links()}}</div>
</div>
        </main>
    </div>
</body>
</html>