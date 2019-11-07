<?php

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

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

Route::resource('Patients','PatientCtrl');

Route::resource('Appoint', 'AppointCtrl');

Route::resource('Settings', 'SettingsCtrl');

Route::resource('User', 'UserCtrl');



Route::get('contactus', function () {
    return view('ContactUs');
});


Route::view('URI', 'viewName');
 
Auth::routes();

Route::get('banner','SettingsCtrl@banner');


Route::get('QrcodeReader', function () {
   return view('qr.index') ;

});



Route::get('SearchP','PatientCtrl@SearchP');

Route::get('Psave','PatientCtrl@Psave');

Route::get('slider','SettingsCtrl@slider');

Route::get('sliderDel','SettingsCtrl@sliderDel');



Route::get('Testimo','SettingsCtrl@Testimo');

Route::get('TestimoDel','SettingsCtrl@TestimoDel');



Route::get('Services','SettingsCtrl@Services');

Route::get('ServicesDel','SettingsCtrl@ServicesDel');




Route::get('AppointPickup','PatientCtrl@AppointPickup');

Route::get('appointment','appointCtrl@index');



 
Route::get('deletepro/{id}', function ($id) {
   DB::table('patients')->where('unique_id',$id)->delete();
   return redirect('dashboard')->with('success','Profile deleted');
   
});



Route::get('findPatient', 'PatientCtrl@findPatient');



Route::get('/', function () {
    return view('index');
});


Route::get('index', function () {
    return view('index');
});


Route::get('logout', function () {
    Auth::logout();
    return redirect('index');
});

 Route::get('dashboard','DashboardCtrl@index');


  

//Route::get('login', function(){ return view('auth.login');} );



//Route::get('/home', 'HomeController@index')->name('home');
 


Route::get('user/{name?}/{id?}', function($name , $id ){
    return $name .'<br>'. $id;

} )->where(['id'=>'[1-9]+', 'name'=>'[a-zA-Z]+']);





Route::group(['prefix' => 'admin' ], function () {
    return 'ook';
});