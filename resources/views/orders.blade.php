@extends('layouts.app')

@section('style')
<style>
   .paginate{
        display:flex;
        justify-content:space-around;
    }

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
</style>
@endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/hospital') }}"> Dashboard </a>
    </li>
	<li class="nav-item">
        <a class="nav-link" href="{{ url('/hosprofile') }}"> Profile </a>
    </li>
@endsection

@section('content')
    <center> 
        <table style="margin-top: 70px;width:90%;">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Blood Type</th>
                <th>Post</th>
                <th>Delivery Time</th>
                <th>Status</th>
                <th>Order</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                @foreach ($users as $user)
                    @if($user->id == $order->user_id)
                        <th>
                            @if($user->photo)
                                <img class="imgg" src="{{asset('images/donors/' . $user->photo)}}"/>
                            @else
                                <img src="{{ asset('images/user.png') }}" width="52" height="52px"> 
                            @endif
                        </th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->phone }}</th>
                        <th>{{ $user->address }}</th>
                    @endif
                @endforeach
                @foreach ($posts as $post)
                    @if($post->id == $order->post_id)
                       <th>{{ $post->title }}</th>
                       <th>{{ $post->id }}</th>
                    @endif
               @endforeach
                <th>{{ $order->orderTime }}</th>
                @if($order->status == 'Waiting')
                    <th class="red">{{ $order->status }}</th>
                @else
                    <th class="green">{{ $order->status }}</th>
                @endif

                @if($order->status == 'Waiting')
                    <th><form method="post" class="del m-2"  action="{{ route('doneOrder', $order->id) }}">
                        @csrf
                        <button class="btn btn-success" style="background-color:rgba(0, 0, 0, 0);border: 1px solid #fff;" type="submit"> Done </button>
                    </form></th>
                @else
                    <th>-</th>
                @endif
            </tr>
            @endforeach
        </table>
    </center>
@endsection