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
    return view('auth.login');
});

Route::post('/login', 'Auth\LoginController@loginNameOrEmail');

Route::get('/registerLink', 'RegisterController2@registerLink')->name('registerLink');
Route::get('/cancelRegLink', 'RegisterController2@cancelRegLink')->name('cancelRegLink');
Route::POST('/register2', 'RegisterController2@register')->name('register2');


Auth::routes();

//RoomController
Route::get('/home', 'ViewRoomController@viewRoom')->name('home');
Route::get('/room', 'ViewRoomController@viewRoom')->name('room');

//RoomBookingController
Route::get('/bookingForm/{id}', 'RoomBookingController@bookingForm')->name('bookingForm');
Route::POST('/saveBooking', 'RoomBookingController@saveBooking')->name('saveBooking');
Route::get('/listBooking', 'RoomBookingController@listBooking')->name('listBooking');
Route::get('/cancelBooking/{id}', 'RoomBookingController@cancelBooking')->name('cancelBooking');

// Report
Route::get('/viewReport', 'ViewreportController@viewReport')->name('viewReport');
Route::POST('/searchReport', 'ViewreportController@viewReport')->name('searchReport');


//testing
Route::get('/testing', 'Test@index')->name('testing');

Route::get('/login/logout', 'RoomBookingController@logout')->name('logout');

//bcrypt
Route::get('/test', function () {
    $password = bcrypt("password");
   echo $password;
});
