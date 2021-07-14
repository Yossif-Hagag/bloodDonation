@extends('layouts.app')

@section('style')
<style>
    body  {
        background-image: url("{{asset('images/dasAdmin.jpg')}}");
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
            .inputBlue{
                width: 50%;
                height: 70px;
                color: #707070;
                font-style: normal;
                text-align: left;
                font-size: 25px;
                text-align: center;
                margin-bottom: 35px;
                border: 3px solid  #223862;
                border-radius: 5px;
                background-color: white;
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
            .btnBlue:hover{
                border: 3px solid  #223862;
                background-color: white;
                color: black;
                cursor: pointer;
                
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
            .postImg
            {
                
                border-radius:50%;
                width: 120px;
                height:120px;
                border:3px solid #223862;
                float: right; 
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
<div class="container">
   <div class="row">
    <div class="col-md-2"></div>
   <center>
        <table style="width:100%; height: 70% ">
            <tr  class="containerr">
              <td width="10%" height="90%">
                  <img  class="postImg"src="{{asset('images/chat.png')}}"/>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  <br><br><br><br><br><br>     
              </td>
            <td width="100%" height="90%">
                  <div style="margin:5px 0 0 15px">
                      <form method ="POST" action="{{url('storepost')}}">
                        @csrf
                        <input class="inputBlue" type="text" name="body" placeholder="Need Title" required>
                        <select class="inputBlue" aria-label="Default select example" name="title" required>
                                  <option selected value="">&nbsp;&nbsp;Blood Type</option>
                                  <option value="A">&nbsp;&nbsp;A</option>
                                  <option value="B">&nbsp;&nbsp;B</option>
                                  <option value="AB">&nbsp;&nbsp;AB</option>
                                  <option value="O">&nbsp;&nbsp;O</option>
                                </select>
                        <br><br><br><br>
                        <button type="submit" class="btnBlue">Add</button> 
                     </form> 
                </div>                      
            </td>
        </tr>
      </table>
    </center>
  </div>    
</div>

@endsection