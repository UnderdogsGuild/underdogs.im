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
/*
 * Main Site Routes
 */
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*
 * Administration Routes
 */
Route::get('admin', 'Admin\AdministrationController@index');
//Events Controller
Route::get('admin/events', 'Admin\EventsController@index');
Route::get('admin/events/active', 'Admin\EventsController@indexActive');
Route::get('admin/events/unpublished', 'Admin\EventsController@indexUnpublished');
Route::get('admin/events/deleted', 'Admin\EventsController@indexDeleted');
Route::get('admin/events/create', 'Admin\EventsController@create');
Route::get('admin/events/{id}/edit', 'Admin\EventsController@edit');
Route::post('admin/events/{id}/edit', 'Admin\EventsController@update');
Route::post('admin/events/create', 'Admin\EventsController@store');
Route::get('admin/events/{id}/delete', 'Admin\EventsController@destroy');
/*
 * API Routes
 */
Route::get('/api/logo/{color}/uds.svg', 'ApiController@logoSvg');