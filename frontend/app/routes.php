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
Route::post('ajax', 'AjaxController@index');

Route::get('/', function()
{
	return View::make('main');
});

Route::get('status/{order_key}', function($order_key)
{

    $request_url = "http://maxtraffic.eu/bitcoin/public/api/v1/get-order/{$order_key}";

	$server_response = json_decode(file_get_contents($request_url));
	return View::make('status', array('order' => $server_response) );
});

