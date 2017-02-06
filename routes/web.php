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
Route::resource('users', 'UserController');

Route::get('register', function () {
    return view('users.register');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('confirmation/{code}', 'UserController@activateAccount');

Route::get('dashboard', 'HomeController@dashboard');

route::get('profile', 'HomeController@profile');

route::get('profile/{id}/edit', 'UserController@editprofile');
