<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'],  function(){
  Route::resource('meeting', 'MeetingController', ['except' => ['create', 'edit']]);
  Route::resource('meeting/registration', 'RegistrationController', ['only' => ['store', 'destroy']]);
  Route::get('user', ['uses' => 'UserController@store']);
  Route::post('user/signin', ['uses' => 'UserController@singin']);
});
