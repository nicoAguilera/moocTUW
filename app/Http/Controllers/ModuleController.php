<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ModuleRequest;
use App\Http\Controllers\Controller;

//Facades
use Lang;
use Redirect;
use View;

//Models
use App\Models\Course;
use App\Models\Module;
use App\Models\User;

class ModuleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param int $teacherId, $courseId
	 * @return object View
	 */
	public function create($teacherId, $courseId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$title = Lang::get('modules.create_browser_title');

		return View::make('teachers.courses_modules_create', [
								'title'		=> 	$title,
								'teacher'	=>	$teacher,
								'course' 	=> 	$course
							]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ModuleRequest $request
	 * @return Redirect
	 */
	public function store(ModuleRequest $request, $teacherId, $courseId)
	{
		$module = Module::create($request->only(
									'name', 
									'course_id'
								));

		return Redirect::route('teachers.courses.show', [$teacherId, $courseId] )
							->with('alert.success', Lang::get('modules.create_success_alert'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $courseId, int $moduleId
	 * @return Response
	 */
	public function show($courseId, $moduleId)
	{
		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$title = $course->name .' - '. $module->name;

		return View::make('modules.show', [
							'module' 	=> $module, 
							'title' 	=> $title, 
							'course' 	=> $course,
						]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $courseId, $moduleId
	 * @return Response
	 */
	public function edit($courseId, $moduleId)
	{
		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$title = Lang::get('module.edit_browser_title');

		return View::make('modules.edit', [
								'course' 	=> $course,
								'module'	=> $module,
								'title' 	=> $title
							]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($courseId, $moduleId, CourseAndModuleRequest $request)
	{
		$module = Module::findOrFail($moduleId);

		$result = $module->update($request->only('name', 'description', 'start_date', 'end_date'));
		
		if($result === true){
			return Redirect::route('modules.show', [$courseId, $module->id])
					->with('alert.success', Lang::get('module.update_success_alert'));
		}else{
			return Redirect::route('modules.edit', [$courseId, $module->id])
					->with('alert.danger', Lang::get('module.update_danger_alert'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
