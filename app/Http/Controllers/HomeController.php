<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Post;
use App\Donetes;
use App\Hospital;
use App\Delivery;
use App\Order;
use App\BloodType;
use Illuminate\Validation\Rule;
class HomeController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $x = 0;
        if (auth('web')->user()) {
            $ignoredPosts = auth()->user()->donetes->pluck('id')->toArray();
            $posts = Post::whereNotIn('id', $ignoredPosts)->orderby('id','desc')->paginate(5);
        }else{
            $posts = Post::orderby('id','desc')->paginate(5);
        }
        $hospitals = Hospital::all();
        $donates = Donetes::orderby('id','desc')->get();
        $users = User::all();
        return view('home' , ['posts' => $posts, 'hospitals' => $hospitals, 'donates' => $donates, 'x' => $x, 'users' => $users]);
    }



    public function chooseLogin()
    {
        return view('chooseLogin');
    }


    public function chooseDonation($post_id)
    {
        return view('chooseDonation',compact('post_id'));
    }

    public function donate($id)
    {
        $donate = new Donetes();
        $donate->post_id = $id;
        $donate->user_id = auth('web')->user()->id;
        $donate->save();
    }


    public function choosenPostALogin($id)
    {
        $post = '';$x = 0;
        $ignoredPosts = auth('web')->user()->donetes->pluck('id')->toArray();
        $posts = Post::whereNotIn('id', $ignoredPosts)->get();
        foreach ($posts as $postt) {
            if ($postt->id == $id) {
                $post = Post::findOrFail($id);
            }  
        }
        $hospitals = Hospital::all();
        $donates = Donetes::all();
        $users = User::all();
        return view('choosenPostALogin', ['post' => $post, 'hospitals' => $hospitals, 'donates' => $donates, 'x' => $x, 'users' => $users]);
    }

    public function viewPostDonated($id)
    {
        $x = 0;
        $post = Post::findOrFail($id);
        $hospitals = Hospital::all();
        $donates = Donetes::all();
        $users = User::orderby('id', 'desc')->get();
        return view('viewPostDonated', ['post' => $post, 'hospitals' => $hospitals, 'donates' => $donates, 'x' => $x, 'users' => $users]);
    }

    public function inHospital($id)
    {
        $this->donate($id);
        $post = Post::findOrFail($id);
        $hospital = Hospital::findOrFail($post->hospital_id);
        return view('inHospital', compact('hospital'));
    }

     public function indelivery($post_id)
    {
        $post = Post::findOrFail($post_id);
        $hospial_name = $post->hospial ? $post->hospial->name : '';
        $hosid = $post->hospial ? $post->hospial->id : '';
        $userId = auth()->user()->id;
        $deliverys = Delivery::all();
        return view('indelivery', ['hospial_name' => $hospial_name, 'hosid' => $hosid, 'deliverys' => $deliverys, 'userId' => $userId, 'post_id' => $post_id]);
    }

     public function saveOrder($hosid, $post_id, $user_id)
    {
        if (request('radioD') == null) {
            return redirect('donorProfile');
        }else{
        $this->donate($post_id);
        $order = new Order();
        $order->orderTime = request('radioD');
        $order->hospital_id = $hosid;
        $order->post_id = $post_id;
        $order->user_id = $user_id;
        $order->save();
        return redirect('donorProfile');}
    }

    public function donorProfile(){
        $a = 0; $d = 0; $h = 0;
        $donor = User::findOrFail(auth()->user()->id);
        $bloods = BloodType::all();
        $donates = Donetes::where('user_id',auth()->user()->id)->orderby('id', 'desc')->get();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        foreach ($donates as $donate) {
            $a++;
            foreach ($orders as $order) {
                if ($donate->post_id == $order->post_id) {
                    $d++;
                }
            }
        }

        $h = $a - $d;
        return view('donorProfile', ['donor' => $donor, 'bloods' => $bloods, 'donates' => $donates, 'a' => $a, 'd' => $d, 'h' => $h]);
    }

    public function editProfileUser($id){
        $user = User::findOrFail($id);
        return view('editProfileUser', compact('user'));
    }

    public function saveUser($id){
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id)],
            'password' => 'required|string|min:8|confirmed',
            'phone' => ['required', Rule::unique('users', 'phone')->ignore($id)],
        ]);
        if(request('birth_date') < 12){
            $message = 'Sorry, You are less that 12 years';
            return redirect()->route('not_authenticated',$message);
        }
        if(request('drink_cohol') == 'yes'){
            $message = 'Sorry you can not complete Update because you drink Alcohol';
            return redirect()->route('not_authenticated',$message);
        }
        if (!request('drink_cohol')) {
            $message = 'Sorry you must answer if you drink alcohol or not !';
            return redirect()->route('not_authenticated',$message);
        }

        if (request('chronic_diseases') == 'yes') {
            $message = 'Sorry you can not complete Update because you have chronic diseases !';
            return redirect()->route('not_authenticated',$message);
        }
        if (!request('chronic_diseases')) {
            $message = 'Sorry you must answer if you have chronic diseases or not !';
            return redirect()->route('not_authenticated',$message);
        }
        $user = User::find($id);
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->name = request('name');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->birth_date = request('birth_date');
        if(request('photo')){
             $file_extention = request('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/donors';
             request('photo')->move($path,$file_name);
         }else{
            $file_name = '';
         }
        $user->photo = $file_name;
        if(request('selectedBlood') && request('selectedBlood') != 'Select Your Blood'){
            $user->blood_id = request('selectedBlood');
        }
        $user->save();
        return redirect('/donorProfile');
    }

    public function choosenHosprofile($id){
        $hospital = Hospital::findOrFail($id);
        return view('choosenHosprofile', compact('hospital'));
    }
    
    public function choosenDonerprofile($id){
        $user = User::findOrFail($id);
        $bloods = BloodType::all();
        return view('choosenDonerprofile', compact('user'), compact('bloods'));
    }

    
 
}

