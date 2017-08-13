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

Route::get('/', 'HomeController@login');

Route::post('/login', 'HomeController@doLogin');

Route::post('/register', 'HomeController@doRegister');

Route::get('/register', 'HomeController@register');

Route::get('/register', array('as' =>'register','uses'=>'HomeController@register'));

Route::get('/', array('as' =>'login','uses'=>'HomeController@login'));

Route::get('/dash', 'HomeController@admin');

Route::get('/data', function (){
    $user=Auth::user();
    return $user->fullname;
});


