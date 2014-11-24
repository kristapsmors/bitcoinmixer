<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
* Route model binding
* ------------------------------------------
*/
Route::model('user', 'User');

/** ------------------------------------------
* Frontend Routes
* ------------------------------------------
*/
// Confide routes
//Route::get( 'user/create',                 'UserController@create');
//Route::post('user',                        'UserController@store');
Route::get( 'login',                  		 'AuthController@login');
Route::post('login',                  		 'AuthController@do_login');
//Route::get( 'user/confirm/{code}',         'UserController@confirm');
//Route::get( 'user/forgot_password',        'UserController@forgot_password');
//Route::post('user/forgot_password',        'UserController@do_forgot_password');
//Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
//Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'logout',                 		 'AuthController@logout');
Route::get( '/',                             'AuthController@login');

/** ------------------------------------------
* API Routes
* ------------------------------------------
*/

Route::get('api/v1/get-order/{order_key}', function($order_key)
{
    $order = Order::where('order_key', '=', $order_key)->first();

    if($order)
        return $order->toJson();    
    
});

Route::get('api/v1', 'ApiController@index');


/** ------------------------------------------
* Admin Routes
* ------------------------------------------
*/
Route::group(array('prefix' => 'admin', 'before' => 'auth-admin'), function()
{
	# User Management
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit')
        ->where('user', '[0-9]+');
    Route::get('users/status/{user}/{status}', 'AdminUsersController@getStatus')
        ->where(array('user','[0-9]+', 'status' => '[0-1]'));
    Route::controller('users', 'AdminUsersController');
    

    # Order Management
    Route::controller('orders', 'AdminOrdersController');
    Route::controller('/', 'AdminOrdersController');
});
