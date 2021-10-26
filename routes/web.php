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

Route::group(['middleware'=>'guest:web','namespace'=>'site'],function(){

    Route::get('login' , 'loginController@getLogin')->name('site.getLogin');
    Route::post('login' , 'loginController@login')->name('site.login');

});

Route::group(["middleware"=>'auth:web','namespace'=>'site'], function () {

    Route::get('/', 'dashController@index')->name('site.dash');
    Route::get('logout', 'logoutController@index')->name('site.logout');

});
