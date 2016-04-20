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
        Route::post('property/{id}/addDevice', 'PropertyController@addDevice');
        Route::post('property/{id}/removeDevice', 'PropertyController@removeDevice');
        
         // Authorizing and deauthorizing contractors from property.
        Route::post('property/{id}/addContractor', 'PropertyController@addContractor');
        Route::post('property/{id}/removeContractor', 'PropertyController@removeContractor');

        // Devices and notification relationship routes.
        Route::post('device/{id}/addNotification', 'DeviceController@addNotification');
        Route::post('device/{id}/removeNotification', 'DeviceController@removeNotification');       


        // Adding and remove keys from contractors.
         Route::post('contractor/{id}/addKey', 'ContractorController@addKey');
         Route::post('contractor/{id}/removeKey', 'ContractorController@removeKey');

         // Adding and remove contractors from keys.
         Route::post('key/{id}/addContractor', 'KeyController@addContractor');
         Route::post('key/{id}/removeContractor', 'KeyController@removeContractor');

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
    Route::post('api/v1/register/device', 'DeviceController@apiRegister');

    // API for getting contractor's keys
    Route::get('api/v1/users/{id}/keys', 'KeyController@apiGetContractorKeys');

    // API for updating key with time taken.
    Route::post('api/v1/key/taken', 'KeyController@apiUpdateTimeTaken');

    // API for updating key with time returned.
    Route::post('api/v1/key/returned', 'KeyController@apiUpdateTimeReturned');
}); 

// API for login
Route::post('api/v1/login', 'ContractorController@apiLogin');