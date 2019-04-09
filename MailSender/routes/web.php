<?php

//auth
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerUser')->name('registerUser');
Route::post('/login', 'AuthController@loginUser')->name('loginUser');
Route::get('/confirm', 'AuthController@confirm')->name('confirm');
Route::get('/send-verification-email/{email}/{token}', 'AuthController@sendVerificationEmail')->name('sendVerificationEmail');






Route::group(['middleware'=>['isAuth','isVerify']],function (){


//Receiver routes
    Route::get('/', 'ReceiversController@index')->name('dashboard');
    Route::get('/create-receiver', 'ReceiversController@create')->name('createReceiver');
    Route::post('/store-receiver', 'ReceiversController@store')->name('storeReceiver');
    Route::get('/edit-receiver/{id}', 'ReceiversController@edit')->name('editReceiver');
    Route::post('/update-receiver/{id}', 'ReceiversController@update')->name('updateReceiver');
    Route::get('/delete-receiver/{id}', 'ReceiversController@delete')->name('deleteReceiver');
    Route::post('/destroy-receiver/{id}', 'ReceiversController@destroy')->name('destroyReceiver');


//Email sending route
    Route::get('/send-email', 'SendEmailController@index')->name('sendEmail');
    Route::post('/create-notification', 'SendEmailController@createNotification')->name('createNotification');

//logout
    Route::get('logout','AuthController@logout')->name('logout');
});










