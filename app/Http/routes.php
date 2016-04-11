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
// Routes within this group will have access to sessions and  csrf protection.
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return Redirect::route('properties.index');
        } else {
            return view('auth.login');
        }
    });

    Route::get('/login', function () {
        if (Auth::check()) {
            return Redirect::route('properties.index');
        } else {
            return view('auth.login');
        }
    });

    // Routes that requires authentication from the user.
    Route::group(['middleware' => ['auth']], function () { 
        Route::resource('properties', 'PropertyController');

        Route::resource('contractors', 'ContractorController');

        Route::resource('notifications', 'NotificationController');

        Route::resource('devices', 'DeviceController');

        Route::resource('keys', 'KeyController');

        Route::get('auth.logout', 'Auth\AuthController@getLogout');

        // Properties and devices relationship routes.
        Route::post('properties/{id}/addDevice', 'PropertyController@addDevice');
        Route::post('properties/{id}/removeDevice', 'PropertyController@removeDevice');

        // Devices and notification relationship routes.
        Route::post('devices/{id}/addNotification', 'DeviceController@addNotification');
        Route::post('devices/{id}/removeNotification', 'DeviceController@removeNotification');        

    });

    // Authentication routes...
    Route::get('auth.login', 'Auth\AuthController@getLogin');
    Route::post('auth.login', 'Auth\AuthController@postLogin'); 

    // Registration routes...
    Route::get('auth.register', 'Auth\AuthController@getRegister');
    Route::post('auth.register', 'Auth\AuthController@postRegister');
});

Route::group(['middleware' => ['digest']], function () {
    // API for retreiving notification codes
    Route::get('api/v1/notifications/{id}', 'NotificationController@apiShow');

    // API for retreiving device
    Route::get('api/v1/devices/{id}', 'DeviceController@apiShow');

    // API for registering new devices
    Route::post('api/v1/register/device/', 'DeviceController@apiRegister');
}); 

// API for login
Route::post('api/v1/login', 'ContractorController@apiLogin');