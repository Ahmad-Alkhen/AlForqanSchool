<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware'=>'guest:web','namespace'=>'site'],function(){

    Route::get('login' , 'loginController@getLogin')->name('site.getLogin');
    Route::post('login' , 'loginController@login')->name('site.login');

});

Route::group(["middleware"=>'auth:web','namespace'=>'site'], function () {

    Route::get('/', 'dashController@index')->name('site.dash');
    Route::post('/store', 'dashController@store')->name('site.message.store');

    Route::get('download/{id}','dashController@download')->name('site.homeworksFile.download');


    Route::get('logout', 'logoutController@index')->name('site.logout');

});
