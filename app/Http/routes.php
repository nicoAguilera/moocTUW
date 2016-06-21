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

/*
|---------------------------------------------------------------------------
|Rutas del controlador de Administrador
|---------------------------------------------------------------------------
*/

Route::get('admin',[
		'uses'	=>	'AdminController@showPanelAdmin',
		'as'	=>	'admin.panel_admin'
	]);

/*Route::controllers([
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

Route::post('modules', [
		'uses'	=>	'ModuleController@store',
		'as'	=>	'modules.store'
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

Route::get('courses/{courseId}/modules/{moduleId}/activities/{activityId}/edit',[
		'uses'	=>	'ActivityController@edit',
		'as'	=>	'activities.edit'
	]);

Route::patch('courses/{courseId}/modules/{moduleId}/activities/{activityId}',[
		'uses'	=>	'ActivityController@update',
		'as'	=>	'activities.update'
	]);
/*
|----------------------------------------------------------------------------
|Rutas del controlador de profesores
|----------------------------------------------------------------------------
*/

Route::get('courses/{id}/teachers/add', [
		'uses'	=>	'TeacherController@index',
		'as'	=>	'teachers.index'
	]);

Route::get('courses/{id}/teachers/create', [
		'uses'	=>	'TeacherController@create',
		'as'	=>	'teachers.create'
	]);

Route::post('teachers', [
		'uses'	=>	'TeacherController@store',
		'as'	=>	'teachers.store'
	]);

Route::get('courses/{courseId}/teachers/{teacherId}',[
		'uses'	=>	'TeacherController@show',
		'as'	=>	'teachers.show'
	]);
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

Route::resource('students', 'StudentController');