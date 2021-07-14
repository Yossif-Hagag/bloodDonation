<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});
Auth::routes();
Route::get('not/authorized/{message}',function($message){ 
    $msg = $message;
    return view('auth.not_auth',compact('msg'));
})->name('not_authenticated');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/donorProfile', 'HomeController@donorProfile')->middleware('auth:web')->name('donorProfile');
Route::get('/chooseDonation/{post_id}', 'HomeController@chooseDonation')->middleware('auth:web')->name('chooseDonation');
Route::post('home/{id}/donate', 'HomeController@donate')->middleware('auth:web')->name('donate');
Route::get('/choosenPostALogin/{id}', 'HomeController@choosenPostALogin')->middleware('auth:web')->name('choosenPostALogin');
Route::get('/viewPostDonated/{id}', 'HomeController@viewPostDonated')->middleware('auth:web')->name('viewPostDonated');
Route::get('/choosenDonerprofile/{id}', 'HomeController@choosenDonerprofile')->name('choosenDonerprofile');
Route::post('inHospital/{id}', 'HomeController@inHospital')->middleware('auth:web')->name('inHospital');
Route::get('/indelivery/{post_id}','HomeController@indelivery')->middleware('auth:web')->name('indelivery');
Route::post('home/{hid}/{pid}/{uid}/saveOrder', 'HomeController@saveOrder')->middleware('auth:web')->name('saveOrder');
Route::get('/editProfileUser/{id}', 'HomeController@editProfileUser')->middleware('auth:web')->name('editProfileUser');
Route::post('/saveUser/{id}', 'HomeController@saveUser')->middleware('auth:web')->name('saveUser');
Route::get('/choosenHosprofile/{id}', 'HomeController@choosenHosprofile')->name('choosenHosprofile');
Route::get('/admin', 'AdminController@admin')->middleware('auth:admin')->name('admin');
Route::get('/addAdmin', 'AdminController@addAdmin')->middleware('auth:admin')->name('addAdmin');
Route::post('/storeAdmin','AdminController@storeAdmin')->middleware('auth:admin')->name('storeAdmin');
Route::get('/allAdmins', 'AdminController@allAdmins')->middleware('auth:admin')->name('allAdmins');
Route::get('/addHospital', 'AdminController@addHospital')->middleware('auth:admin')->name('addHospital');
Route::post('/storeHospital', 'AdminController@storeHospital')->middleware('auth:admin')->name('storeHospital');
Route::get('/hosList', 'AdminController@hosList')->middleware('auth:admin')->name('hosList');
Route::post('/disableHospital/{id}','AdminController@disableHospital')->middleware('auth:admin')->name('disableHospital');
Route::post('/availableHospital/{id}','AdminController@availableHospital')->middleware('auth:admin')->name('availableHospital');
Route::get('/edit/{id}', 'AdminController@edit')->middleware('auth:admin')->name('edit');
Route::get('/editProfileAdmin/{id}', 'AdminController@editProfileAdmin')->middleware('auth:admin')->name('editProfileAdmin');
Route::patch('/saveHospital/{id}', 'AdminController@saveHospital')->middleware('auth:admin')->name('saveHospital');
Route::post('/saveAdmin/{id}', 'AdminController@saveAdmin')->middleware('auth:admin')->name('saveAdmin');
Route::get('/allUsers/', 'AdminController@allUsers')->middleware('auth:admin')->name('allUsers');
Route::post('/disableuser/{id}', 'AdminController@disableuser')->middleware('auth:admin')->name('disableuser');
Route::post('/availableuser/{id}', 'AdminController@availableuser')->middleware('auth:admin')->name('availableuser');
Route::get('/adminProfile', 'AdminController@adminProfile')->middleware('auth:admin')->name('adminProfile');
Route::get('/postsChoosenHos/{id}', 'AdminController@postsChoosenHos')->middleware('auth:admin')->name('postsChoosenHos');
Route::get('/hospital', 'HospitalController@hospital')->middleware('auth:hospital')->name('hospital');
Route::get('/chooseLogin','HomeController@chooseLogin')->name('chooseLogin');
Route::get('/admin/login','AdminController@adminLogin')->name('adminLogin');
Route::post('/admin/save/login','AdminController@checkAdminLogin')->name('checkAdminLogin');
Route::get('/hospital/login','HospitalController@hospitalLogin')->name('hospitalLogin');
Route::post('/hospital/save/login','HospitalController@checkHospitalLogin')->name('checkHospitalLogin');
Route::get('/createpost','HospitalController@createpost')->middleware('auth:hospital')->name('createpost');
Route::post('/storepost','HospitalController@storepost')->middleware('auth:hospital')->name('storepost');
Route::get('/viewposts','HospitalController@viewposts')->middleware('auth:hospital')->name('viewposts');
Route::get('/hosprofile','HospitalController@hosprofile')->middleware('auth:hospital')->name('hosprofile');
Route::get('/deliveryTimes','HospitalController@deliveryTimes')->middleware('auth:hospital')->name('deliveryTimes');
Route::post('/deleteDelivery{id}','HospitalController@deleteDelivery')->middleware('auth:hospital')->name('deleteDelivery');
Route::post('/changeHosTime{id}','HospitalController@changeHosTime')->middleware('auth:hospital')->name('changeHosTime');
Route::get('/viewdonors','HospitalController@viewdonors')->middleware('auth:hospital')->name('viewdonors');
Route::post('/deliverystore','HospitalController@deliverystore')->name('deliverystore');
Route::get('/orders','HospitalController@orders')->middleware('auth:hospital')->name('orders');
Route::get('/editProfileHos/{id}', 'HospitalController@editProfileHos')->middleware('auth:hospital')->name('editProfileHos');
Route::post('/doneOrder/{id}', 'HospitalController@doneOrder')->middleware('auth:hospital')->name('doneOrder');
Route::post('/saveHospitalll/{id}', 'HospitalController@saveHospitalll')->middleware('auth:hospital')->name('saveHospitalll');
Route::post('/disablePost/{id}', 'HospitalController@disablePost')->middleware('auth:hospital')->name('disablePost');
Route::post('/avaliblePost/{id}', 'HospitalController@avaliblePost')->middleware('auth:hospital')->name('avaliblePost');
