<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Admin;
use App\Hospital;
use App\User;
use App\Post;
use App\Order;
use App\Donetes;
use App\BloodType;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function admin()
    {
        $h = 0; $p = 0; $a = 0; $d = 0; $o = 0; $pd = 0;
        $hospitals = Hospital::all();
        $posts = Post::all();
        $admins = Admin::all();
        $donors = User::all();
        $orders = Order::all();
        $donates = Donetes::all();
        foreach ($hospitals as $hospital) {$h++;}
        foreach ($posts as $post) {if ($post->hospital_id != NULL) {$p++;}}
        foreach ($admins as $admin) {$a++;}
        foreach ($donors as $donor) {$d++;}
        foreach ($orders as $order) {if ($order->hospital_id != NULL) {$o++;}}
        foreach ($donates as $donate) {if ($donate->post_id != NULL && $donate->user_id != NULL) {$pd++;}}
        return view('admin', ['h' => $h, 'p' => $p, 'a' => $a, 'd' => $d, 'o' => $o, 'pd' => $pd]);
    }

    public function adminLogin(){
        return view('adminLogin');
    }

    public function checkAdminLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }

    public function addAdmin(){
        return view('addAdmin');
    }

    public function storeAdmin(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|max:255 ',
            'phone' => 'required|unique:admins',
        ]);
       if($request->file('photo')){
             $file_extention = $request->file('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/admins';
             $request->photo->move($path,$file_name);
         }else{
            $file_name = '';
         }
         Admin::create([
            'photo' => $file_name,
            'name'=> $request->name,
            'password'=> Hash::make($request['password']),
            'phone'=> $request->phone,
            'email'=> $request->email,  
        ]);
         return redirect('/allAdmins');
    }

     public function allAdmins(){
        $admins = Admin::orderby('id','desc')->paginate(9);
        return view('allAdmins', compact('admins'));
    }

    public function addHospital(){
        return view('addHospital');
    }

    public function storeHospital(Request $request){
        $this->validate($request, [
             'email' => 'required|email|unique:hospitals_create',
             'password' => 'required|min:6',
              'name' => 'required|string|max:255',
              'type' => 'required|string',
             'adress' => 'required|string',
             'radio1' => 'required',
         ]);
         if($request->file('photo')){
             $file_extention = $request->file('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/hospital';
             $request->photo->move($path,$file_name);
         }else{
            $file_name = '';
         }
       
       $hospital = new Hospital();
       $hospital->photo = $file_name;
       $hospital->email = request('email');
       $hospital->password = Hash::make(request('password'));
       $hospital->name = request('name');
       $hospital->adress = request('adress');
       $hospital->type = request('type');
       $hospital->hasDelivery = request('radio1');
       $hospital->disable = 0;
       $hospital->hosTime = '';
       $hospital->save();
        
         return redirect('/hosList');
    }

     public function hosList(){
        $x = 0;
        $data = Hospital::orderby('id' ,'desc')->get();
        $posts = Post::all();
       return view('hosList', ['data' => $data, 'posts' => $posts, 'x' => $x]);
    }

    public function disableHospital($id){
        $hospital = Hospital::findOrFail($id);
        $hospital->disable = 1;
        $hospital->save();
        return back();
    }

    public function availableHospital($id){
        $hospital = Hospital::findOrFail($id);
        $hospital->disable = 0;
        $hospital->save();
        return back();
    }

    public function edit($id){
        $hospital = Hospital::find($id);
        return view('edit', compact('hospital'));
    }

    public function saveHospital($id){
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
        return redirect('/hosList');
    }

     public function allUsers(){
        $users=User::orderby('id','desc')->paginate(9);
        $bloods = BloodType::all();
       return view('allUsers', ['users' => $users, 'bloods' => $bloods]);
    }

    public function disableuser($id){
        $user = User::findOrFail($id);
        $user->disable = 1;
        $user->save();
        return back();
    }

    public function availableuser($id){
        $user = User::findOrFail($id);
        $user->disable = 0;
        $user->save();
        return back();
    }

    public function adminProfile(){
        $admin = Admin::findOrFail(auth()->user()->id);
        return view('adminProfile', compact('admin'));
    }

    public function editProfileAdmin($id){
        $admin = Admin::findOrFail($id);
        return view('editProfileAdmin', compact('admin'));
    }

    public function saveAdmin($id){
        request()->validate(
            ['email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($id)],
            'password' => 'required|min:6|confirmed',
            'name' => 'required|max:255 ',
            'phone' => ['required', Rule::unique('admins', 'phone')->ignore($id)],
        ]);
        $admin = Admin::find($id);
        $admin->email = request('email');
        $admin->password = Hash::make(request('password'));
        $admin->name = request('name');
        $admin->phone = request('phone');
        if(request('photo')){
             $file_extention = request('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/admins';
             request('photo')->move($path,$file_name);
         }else{
            $file_name = '';
         }
        $admin->photo = $file_name;
        $admin->save();
        return redirect('/adminProfile');
    }

    public function postsChoosenHos($id){
        $x = 0;
        $posts = Post::where('hospital_id', $id)->orderby('id','desc')->paginate(5);
        $hospital = Hospital::findOrFail($id);
        $photo = $hospital->photo;
        $donates = Donetes::all();
        $users = User::all();
        return view('postsChoosenHos' , ['posts' => $posts, 'hospital' => $hospital, 'photo' => $photo, 'donates' => $donates, 'users' => $users, 'x' => $x]);
    }




}
