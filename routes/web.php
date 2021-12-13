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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//check traits
Route::get('/test', function(){
    return Auth::user()->test();
});

Route::group(['middleware' => 'auth'], function () {
   Route::get('/home', 'HomeController@index')->name('home');

   Route::get('/profile/{slug}', 'ProfileController@index');

   Route::get('/ChangePhoto', function(){
      return view('profile.pic');
   });
   Route::get('/editProfile', 'ProfileController@editProfileForm');
   Route::post('/updateProfile', 'ProfileController@updateProfile');
   Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');

   //  Route::get('/editProfile', function(){
   //    return view('profile.editProfile')->with('data', Auth::user()->profile); //sa relationship to ee
   //    //yung data pwede maging variable sa blade like $data run mo sa blade para makita another tip sa baba
   //    //{{$data}} //eto pang kukunin yung sa users table
   //    {{Auth::user()}} //eto kasama yung nakarelation ship sa kanya
   // });
   
   Route::get('/findFriends','ProfileController@findFriends');
   // Route::post('/addFriends','ProfileController@findFriends');

   Route::get('/addFriends/{id}', 'ProfileController@sendFriendRequest');
  
});

Route::get('/logout', 'Auth\LoginController@logout');