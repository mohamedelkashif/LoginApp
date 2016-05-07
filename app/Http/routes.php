<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('signup','signupController@register');
Route::get('login','logincontroller@showlogin');
Route::post('signup','signupController@doregister');
//Route::get('auth/ViaGoogle','Auth\AuthController@loginWithGoogle');

Route::get('google', 'Auth\AuthController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback');
Route::post('login','logincontroller@login'); 
Route::get('logout','logincontroller@logout');
Route::get('home','logincontroller@index');

Route::get('/{confirmationCode}','signupController@confirmationState');
Route::post('/emailconf','signupController@postConfirmation');

Route::get('getlogged','logincontroller@login');
