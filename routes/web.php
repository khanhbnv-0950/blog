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

Route::get('/', function () {
    return view('welcome');
});

Route::get('role', [
	'middleware' => 'Roles:admin',
	'uses' => 'TestController@index'
]);

Route::get('/register', function() {
   return view('register');
});
Route::get('/user/register', function () {
	return view('register');
});
Route::post('/user/register', ['uses' => 'UserController@postRegister']);

# Cookie
Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

# Session
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

# Validation
Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

# Upload File
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

# Email
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

# Ajax
Route::get('ajax',function() {
   return view('message');
});
Route::post('/getmsg','AjaxController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin_dashboard', 'Admin\DashboardController@index');
Route::get('/seller_dashboard', 'Seller\DashboardController@index');
Route::get('/admin_dashboard', 'Admin\DashboardController@index')->middleware('role:admin');
Route::get('/seller_dashboard', 'Seller\DashboardController@index')->middleware('role:seller');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
