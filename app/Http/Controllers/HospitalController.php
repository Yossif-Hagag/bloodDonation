<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Hospital;
use App\Post;
use App\User;
use App\Donetes;
use App\Delivery;
use App\Order;
use App\BloodType;
use Illuminate\Validation\Rule;

class HospitalController extends Controller
{
    public function hospital()
    {
        $o = 0; $d = 0; $p = 0; $dt = 0;
        $orders = Order::where('hospital_id', auth()->user('hospital')->id)->get();
        $posts = Post::where('hospital_id', auth('hospital')->user()->id)->get()->pluck('id')->toArray();
        $donetes = Donetes::whereIn('post_id', $posts)->get()->pluck('user_id')->toArray();
        $users = User::whereIn('id', $donetes)->get();
        $deliverys = Delivery::where('hospital_id', auth('hospital')->user()->id)->get();
        foreach ($orders as $order) {$o++;}
        foreach ($users as $user) {$d++;}
        foreach ($posts as $post) {$p++;}
        foreach ($deliverys as $delivery) {$dt++;}

        return view('hospital',['o' => $o, 'd' => $d, 'p' => $p,'dt' => $dt]);
    }

    public function hospitalLogin(){ 
        return view('hospitalLogin');
    }

    public function checkHospitalLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('hospital')->attempt(['email' => $request->email, 'password' => $request->password, 'disable' => 0])) {
            return redirect()->intended('/hospital');
        }
        $hos = Hospital::where('email', $request->email)->get();
        if ($hos[0]->disable == 1) {
            return redirect()->route('hospitalLogin',['alert' => 1])->withInput($request->only('email'));
        }
        return back()->withInput($request->only('email'));
    }

    public function createpost(){
        return view('createpost');
    }

    public function viewposts(){
        $x = 0;$y = 0;
        $posts = Post::where('hospital_id', auth('hospital')->user()->id)->orderby('id','desc')->paginate(5);
        $hospital = auth('hospital')->user();
        $photo = auth('hospital')->user()->photo;
        $donates = Donetes::orderby('id','desc')->get();
        $users = User::all();
        $orders = Order::all();
        return view('viewposts' , ['posts' => $posts, 'hospital' => $hospital, 'photo' => $photo, 'donates' => $donates, 'users' => $users, 'x' => $x, 'orders' => $orders, 'y' => $y]);
    }

    public function storepost(post $post){

    	$post = new post();
        $post->body = request('body');
        $post->title = request('title');
        $post->hospital_id = auth('hospital')->user()->id;
        $post->disable = 0;
        $post->save();
        return redirect('viewposts');

    }

    public function hosprofile(){
        $hospital = auth('hospital')->user();
        return view('hosprofile', ['hospital' => $hospital]);
    }

    public function deliveryTimes(){
        $hospital = auth('hospital')->user();
        $deliverys = Delivery::orderby('id','desc')->get();
        return view('deliveryTimes', ['hospital' => $hospital, 'deliverys' => $deliverys]);
    }

     public function viewdonors(){
        $posts = Post::where('hospital_id', auth('hospital')->user()->id)->get()->pluck('id')->toArray();
        $donetes = Donetes::whereIn('post_id', $posts)->get()->pluck('user_id')->toArray();
        $users = User::whereIn('id', $donetes)->orderby('id','desc')->get();
        $bloods = BloodType::all();
        return view('viewdonors', ['users' => $users, 'bloods' => $bloods]);
    }

    public function deliverystore(delivery $delivery){
        $delivery->day = request('day');      
        $delivery->from = request('from');      
        $delivery->to = request('to');
        $delivery->hospital_id = auth('hospital')->user()->id;
        $delivery->save();      
        return redirect('deliveryTimes');
    }

    public function deleteDelivery(Delivery $id){
        $id->delete();
        return back();
    }

    public function changeHosTime($id){
        $hospital = Hospital::findOrFail($id);
        $hospital->hosTime = '';
        $hospital->hosTime = request('time');
        $hospital->save();
        return back();
    }

    public function orders(){
        $orders = Order::where('hospital_id', auth('hospital')->user()->id)->orderby('id','desc')->get();
        $users = User::all();
        $posts = Post::all();
        return view('orders', ['orders' => $orders, 'users' => $users, 'posts' => $posts]);
    }

    public function doneOrder($id){
        $order = Order::findOrFail($id);
        $order->status = 'Done';
        $order->save();
        return back();
    }

    public function editProfileHos($id){
        $hospital = Hospital::find($id);
        return view('editProfileHos', compact('hospital'));
    }

    public function saveHospitalll($id){
        request()->validate(
            ['email' => ['required', 'email', Rule::unique('hospitals_create', 'email')->ignore($id)],
             'password' => 'required|min:6',
              'name' => 'required|string|max:255',
              'type' => 'required|string',
             'adress' => 'required|string',
             'radio1' => 'required',
        ]);
        $hospital = Hospital::find($id);
        $hospital->email = request('email');
        if (request('password')) {
            $hospital->password = Hash::make(request('password'));
        }
        $hospital->name = request('name');
        $hospital->adress = request('adress');
        $hospital->type = request('type');
        if(request('photo')){
             $file_extention = request('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/hospital';
             request('photo')->move($path,$file_name);
         }else{
            $file_name = '';
         }
        $hospital->photo = $file_name;
        $hospital->hasDelivery = request('radio1');
        $hospital->save();
        return redirect('/hosprofile');
    }

    public function disablePost($id){
        $post = Post::findOrFail($id);
        $post->disable = 1;
        $post->save();
        return back();
    }

    public function avaliblePost($id){
        $post = Post::findOrFail($id);
        $post->disable = 0;
        $post->save();
        return back();
    }




}
