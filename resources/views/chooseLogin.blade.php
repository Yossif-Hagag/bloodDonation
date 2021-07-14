@extends('layouts.app')

@section('style')
<style>
body{
 background: rgb(117,176,245);
 background: radial-gradient(circle, rgb(146, 40, 40) 0%, rgb(47, 26, 26) 100%);
}
.icons{
	width: 10rem;
	height: 10rem;
}
.icons:hover{
	background-color: rgba(0, 0, 0, 0.2);
}
.link{
	 color:white;
	 text-decoration: none;
}

.link:hover{
	color: #fff;
}
</style>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ml-5 mb-5 d-flex justify-content-between">
			  <div class="d-flex flex-column justify-content-between" style="margin-top:5rem;">
				  <div><a href="{{ route('login') }}"><img src="images/loginUser.png" class="icons"></a></div>
				 <div class="ml-5 mt-2"> <a href="{{ route('login') }}" class="link"> Login User </a></div>
			  </div>
			  <div class="d-flex flex-column justify-content-between" style="margin-top:5rem;">
				  <div><a href="{{ route('adminLogin') }}"><img src="images/adminlogin.png" class="icons"></a></div>
				  <div class="ml-5 mt-2"><a href="{{ route('adminLogin') }}" class="link"> Login Admin </a></div>
			  </div>
			  <div class="d-flex flex-column justify-content-between" style="margin-top:5rem;">
				  <div><a href="{{ route('hospitalLogin') }}"><img src="images/loginHospital.png" class="icons"></a></div>
				  <div class="ml-5 mt-2"><a href="{{ route('hospitalLogin') }}" class="link"> Login Hospital </a></div>
			  </div>
		</div>
	</div>
</div>
@endsection