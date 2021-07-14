<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blood Donation</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <a href="{{ url('/') }}"><img src="images/Logo.png" style="height: 75px;" alt="Logo"></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="images/Group2.svg" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#header-section">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#digital-marketing-section">General&nbsp;Info</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#feedback-section">Team</a>
          </li>
          @auth
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/donorProfile') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
                </li>
            @elseauth('admin')
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
                </li>
            @elseauth('hospital')
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/hospital') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}"> Needs </a>
                </li>
            @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Needs</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('chooseLogin') }}">Login</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
          @endauth
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">Welcome To Blood Donation </h1>
      <h6 class="font-weight-normal text-muted pb-3">Connecting Donor With Patient<br>Be Helpful</h6>
      <img src="images/welcome3.jpg" style="height:500px; width: 6600px; border: 1px; border-radius: 80px;" alt="" class="img-fluid">
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      


      <section class="digital-marketing-service" id="digital-marketing-section">
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h3 class="m-0">This is a small information </h3>
            <div class="col-lg-7 col-xl-6 p-0">
              <p class="py-4 m-0 text-muted">Donor donate ever five month one time </p>
              <p class="font-weight-medium text-muted">You won't be able to donate if you does not eat anything before the Donation</p>

<p class="py-4 m-0 text-muted">There is a lot of Blood types Like : "A-" , "A+" , "B-", "B+" , "O-", "O+"  </p>

            </div>    
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="images/welcome1.jpg" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="images/welcome2.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Each one of these types can be matched with some types as shown below :</h3>
            <div class="col-lg-9 col-xl-8 p-0">
              <p class="py-4 m-0 text-muted font-weight-medium">A+ &nbsp;&nbsp;<span style="color:red;">donates</span>&nbsp;&nbsp; A+ , B- ,B+<br>A- &nbsp;&nbsp;<span style="color:red;">donates</span>&nbsp;&nbsp; A+ , A , B- ,B+ </p>
              <p class="pb-2 font-weight-medium text-muted">B+ &nbsp;&nbsp;<span style="color:red;">donates</span>&nbsp;&nbsp; A+ , B ,B+<br>B- &nbsp;&nbsp;<span style="color:red;">donates</span>&nbsp;&nbsp; A+ , B ,B+ ,B- ,A-</p>
               <p class="pb-2 font-weight-medium text-muted">O &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">donates</span>&nbsp;&nbsp; with any blood type</p>
            </div>
          </div>
        </div>
      </section> 


      <!-- here is our team-->
      <section class="customer-feedback" id="feedback-section">
        <div class="row">
          <div class="col-12 text-center pb-5">
            <h2>Our Great Team </h2>
            <h6 class="section-subtitle text-muted m-0">Blood Donation Creators</h6>
          </div>
           <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/.jpg" width="89" height="89" alt="" class="img-customer">
                    <p class="m-0 py-3 text-muted"> Our Doctor That We thanks to All her effort with us.</p>
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">DR. Hanan Fahmy</h6>
                    <h6 class="customer-designation text-muted m-0">Our Supervisor</h6>
                  </div>
                </div>
              </div>

          <div class="owl-carousel owl-theme grid-margin">
              <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/mic.jpg" width="89" height="89" alt="" class="img-customer">                    
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">Michael Ashraf</h6>
                    <h6 class="customer-designation text-muted m-0">Front-End Developer</h6>
                  </div>
                </div>
              </div>


              <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/omar1.jpg" width="89" height="89" alt="" class="img-customer">
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">Omar Wagdy</h6>
                    <h6 class="customer-designation text-muted m-0">Back-End Developer</h6>
                  </div>
                </div>
              </div>


              <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/mario.jpg" width="89" height="89" alt="" class="img-customer">                 
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">Mario Maher </h6>
                    <h6 class="customer-designation text-muted m-0">Front-End Developer</h6>
                  </div>
                </div>
              </div>

              <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/yossif.jpg" width="89" height="89" alt="" class="img-customer">
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">Yossif Hagag</h6>
                    <h6 class="customer-designation text-muted m-0">Back-End Developer</h6>
                  </div>
                </div>
              </div>

              <div class="card customer-cards">
                <div class="card-body">
                  <div class="text-center">
                    <img src="images/omar2.jpg" width="89" height="89" alt="" class="img-customer">
                    <div class="content-divider m-auto"></div>
                    <h6 class="card-title pt-3">Omar Anwar</h6>
                    <h6 class="customer-designation text-muted m-0">Front-End Developer</h6>
                  </div>
                </div>
              </div>

             
          </div>
        </div>

      </section>

      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2021 Blood Donation All rights reserved.</p>
      </footer>
      <!-- Modal for Contact - us Button -->
      <!-- <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#exampleModal">  Contact Us  </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="Email-1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Message">Message</label>
                  <textarea class="form-control" id="Message" placeholder="Enter your Message"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div> -->
    </div> 
  </div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/landingpage.js') }}"></script>
</body>
</html>
