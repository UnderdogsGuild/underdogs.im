<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Auth as Auth2;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('test', function() {
    return \Config::get('permissions');
});

Route::get('/api/logo/{color}/uds.svg', 'ApiController@logoSvg');