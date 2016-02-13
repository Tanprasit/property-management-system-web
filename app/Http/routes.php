<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/', function () {
    return Redirect::to('login');
});

// Authentication routes...
Route::get('auth.login', 'Auth\AuthController@getLogin');
Route::get('auth.logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth.register', 'Auth\AuthController@getRegister');
Route::post('auth.register', 'Auth\AuthController@postRegister');

// Routes within this group will have acess to sessions and  csrf protection.
Route::group(['middleware' => ['web']], function () {

    Route::get('/login', function () {
        return view('auth.login');
    });

    // Routes that requires authentication from the user.
    Route::group(['middleware' => ['auth']], function () { 
        Route::get('properties', 'PropertyController@index');

        Route::get('contractors', function () {
            return view('contractors');
        });

        Route::get('notifications', function () {
            return view('notifications');
        });

        Route::get('devices', function () {
            return view('devices');
        });

    });

    Route::post('auth.login', 'Auth\AuthController@postLogin'); 
});
