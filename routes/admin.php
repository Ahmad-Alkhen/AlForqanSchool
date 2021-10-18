<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'guest:admin','namespace'=>'admins'],function(){

    Route::get('login' , 'loginController@getLogin')->name('admin.getLogin');
    Route::post('login' , 'loginController@login')->name('admin.login');

});


Route::group(["middleware"=>'auth:admin','namespace'=>'admins'], function () {

    Route::get('/','dashController@index')->name('admin.dash');
    Route::get('logout','logoutController@index')->name('admin.logout');

    /*---------------------- Admins Route --------------------*/

    Route::group(['prefix'=>'admins'],function(){

        Route::get('/','adminController@index')->name('admin.index');
        Route::get('create','adminController@create')->name('admin.create');
        Route::post('store','adminController@store')->name('admin.store');
        Route::get('edit/{id}','adminController@edit')->name('admin.edit');
        Route::post('update/{id}','adminController@update')->name('admin.update');
        Route::get('delete/{id}','adminController@delete')->name('admin.delete');
    });


    /*---------------------- Users Route --------------------*/
    Route::group(['prefix'=>'users'],function(){

        Route::get('/','userController@index')->name('admin.user.index');
        Route::get('create','userController@create')->name('admin.user.create');
        Route::post('store','userController@store')->name('admin.user.store');
        Route::get('edit/{id}','userController@edit')->name('admin.user.edit');
        Route::post('update/{id}','userController@update')->name('admin.user.update');
        Route::get('delete/{id}','userController@delete')->name('admin.user.delete');
    });

    /*---------------------- registers Route --------------------*/
    Route::group(['prefix'=>'registers'],function(){

        Route::get('/','registerController@index')->name('admin.register.index');
        Route::get('create','registerController@create')->name('admin.register.create');
        Route::post('store','registerController@store')->name('admin.register.store');
        Route::get('edit/{id}','registerController@edit')->name('admin.register.edit');
        Route::post('update/{id}','registerController@update')->name('admin.register.update');
        Route::get('delete/{id}','registerController@delete')->name('admin.register.delete');
    });

    /*---------------------- registerStds Route --------------------*/
    Route::group(['prefix'=>'registerStds'],function(){

        Route::get('/','registerStdController@index')->name('admin.registerStd.index');
        Route::get('create','registerStdController@create')->name('admin.registerStd.create');
        Route::post('store','registerStdController@store')->name('admin.registerStd.store');
        Route::get('edit/{id}','registerStdController@edit')->name('admin.registerStd.edit');
        Route::post('update/{id}','registerStdController@update')->name('admin.registerStd.update');
        Route::get('delete/{id}','registerStdController@delete')->name('admin.registerStd.delete');
        Route::post('change','registerStdController@change')->name('admin.registerStd.change');
    });
});
