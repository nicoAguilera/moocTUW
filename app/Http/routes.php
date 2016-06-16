<?php

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

Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'welcome']);

Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function()
{
	//Login
	Route::get('login', ['uses' => 'AuthController@getLogin', 'as' => 'login']);
	Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => 'login']);

	//Signup
	Route::get('signup', ['uses' => 'AuthController@getSignup', 'as' => 'signup']);
	Route::post('signup', ['uses' => 'AuthController@postSignup', 'as' => 'signup']);

	//Logout
	Route::get('logout', ['uses' => 'AuthController@getLogout', 'as' => 'logout']);
});



/*Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

/*
|---------------------------------------------------------------------------
|Rutas adiconales
|---------------------------------------------------------------------------
*/
Route::post('cursos/guardar', 'CourseController@saveChanges');

Route::get('cursos/{id}/contenido', 'CourseController@showEditor');

/*
|----------------------------------------------------------------------------
|Rutas del controlador de modulos
|----------------------------------------------------------------------------
*/

Route::get('courses/{id}/modules/create', [
		'uses'	=> 	'ModuleController@create', 
		'as'	=> 	'modules.create'
	]);

Route::get('courses/{courseId}/modules/{moduleId}', [
		'uses'	=>	'ModuleController@show',
		'as'	=>	'modules.show'
	]);

Route::get('courses/{courseId}/modules/{moduleId}/edit', [
		'uses'	=>	'ModuleController@edit',
		'as'	=>	'modules.edit'
	]);

Route::patch('courses/{courseId}/modules/{moduleId}', [
		'uses'	=>	'ModuleController@update',
		'as'	=>	'modules.update'
	]);

Route::post('modules', [
		'uses'	=>	'ModuleController@store',
		'as'	=>	'modules.store'
	]);

/*
|----------------------------------------------------------------------------
|Rutas del controlador de actividades
|----------------------------------------------------------------------------
*/

Route::get('courses/{courseId}/modules/{moduleId}/activities/create', [
		'uses'	=>	'ActivityController@create',
		'as'	=>	'activities.create'
	]);

Route::post('activities', [
		'uses'	=>	'ActivityController@store',
		'as'	=>	'activities.store'
	]);

Route::get('courses/{courseId}/modules/{moduleId}/activities/{activityId}', [
		'uses'	=>	'ActivityController@show',
		'as'	=>	'activities.show'
	]);
/*
|----------------------------------------------------------------------------
|Rutas del controlador de profesores
|----------------------------------------------------------------------------
*/

Route::resource('profesores', 'TeacherController');

/*
|----------------------------------------------------------------------------
|Rutas del controlador de cursos
|----------------------------------------------------------------------------
*/

Route::resource('courses', 'CourseController');

/*
|----------------------------------------------------------------------------
|Rutas del controlador de alumnos
|----------------------------------------------------------------------------
*/

Route::resource('alumnos', 'StudentController');