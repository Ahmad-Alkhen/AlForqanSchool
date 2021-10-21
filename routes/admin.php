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
        Route::post('delete','registerStdController@delete')->name('admin.registerStd.delete');
        Route::post('change','registerStdController@change')->name('admin.registerStd.change');
    });


    /*---------------------- registers Route --------------------*/
    Route::group(['prefix'=>'subjects'],function(){

        Route::get('/','subjectController@index')->name('admin.subject.index');
        Route::get('create','subjectController@create')->name('admin.subject.create');
        Route::post('store','subjectController@store')->name('admin.subject.store');
        Route::post('delete','subjectController@delete')->name('admin.subject.delete');
    });


    /*---------------------- points Route --------------------*/
    Route::group(['prefix'=>'points'],function(){

        Route::get('/','pointController@index')->name('admin.point.index');
        Route::get('create','pointController@create')->name('admin.point.create');
        Route::post('store','pointController@store')->name('admin.point.store');
        Route::post('delete','pointController@delete')->name('admin.point.delete');

    });

    /*---------------------- homeworks Route --------------------*/
    Route::group(['prefix'=>'homeworks'],function(){

        Route::get('/','homeworkController@index')->name('admin.homework.index');
        Route::get('create','homeworkController@create')->name('admin.homework.create');
        Route::post('store','homeworkController@store')->name('admin.homework.store');
        Route::post('delete','homeworkController@delete')->name('admin.homework.delete');

    });

    /*---------------------- marks Route --------------------*/
    Route::group(['prefix'=>'marks'],function(){

        Route::get('/','markController@index')->name('admin.mark.index');
        Route::post('/','markController@show_sudent')->name('admin.mark.show_Student');
        //Route::get('create','markController@create')->name('admin.mark.create');
        Route::post('store_recite1','markController@store_recite1')->name('admin.mark.store_recite1');
        Route::post('store_activity1','markController@store_activity1')->name('admin.mark.store_activity1');
        Route::post('store_recite2','markController@store_recite2')->name('admin.mark.store_recite2');
        Route::post('store_activity2','markController@store_activity2')->name('admin.mark.store_activity2');
       // Route::post('delete','markController@delete')->name('admin.mark.delete');

    });

    /*---------------------- Notes Route --------------------*/
    Route::group(['prefix'=>'notes'],function(){

        Route::get('/','noteController@index')->name('admin.note.index');
        Route::get('create','noteController@create')->name('admin.note.create');
        Route::post('store','noteController@store')->name('admin.note.store');
        Route::get('edit/{id}','noteController@edit')->name('admin.note.edit');
        Route::post('update/{id}','noteController@update')->name('admin.note.update');
        Route::get('delete/{id}','noteController@delete')->name('admin.note.delete');
    });

});
