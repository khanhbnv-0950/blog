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
	'middleware' => 'Role:admin',
	'uses' => 'TestController@index'
]);

Route::get('/register', function() {
   return view('register');
});
Route::get('/user/register', function () {
	return view('register');
});
Route::post('/user/register', ['uses' => 'UserController@postRegister']);

Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');