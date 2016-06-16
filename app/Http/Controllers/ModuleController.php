<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CourseAndModuleRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Lang;
use Redirect;
use View;

//Models
use App\Models\Course;
use App\Models\Module;

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
	 * @param int $courseId
	 * @return object View
	 */
	public function create($courseId)
	{
		$course = Course::findOrFail($courseId);

		$title = Lang::get('module.create_browser_title');

		return View::make('modules.create', ['title' => $title, 'course' => $course]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CourseAndModuleRequest $request
	 * @return Redirect
	 */
	public function store(CourseAndModuleRequest $request)
	{
		$module = Module::create($request->only(
									'name', 
									'description', 
									'start_date', 
									'end_date', 
									'course_id'
								));

		return Redirect::route('courses.show', $request->only('course_id'))
							->with('alert.success', Lang::get('module.create_success_alert'));
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

		return view('modules.show', [
			'module' 		=> $module, 
			'title' 		=> $title, 
			'course' 		=> $course,
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

		return view('modules.edit', ['course' => $course, 'module' => $module, 'title' => $title]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($courseId, $moduleId, CourseAndModuleRequest $request)
	{
		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$result = $module->update($request->only('name', 'description', 'start_date', 'end_date'));
		
		if($result === true){
			return Redirect::route('modules.show', [$course->id, $module->id])
					->with('alert.success', Lang::get('module.update_success_alert'));
		}else{
			return Redirect::route('modules.edit', [$course->id, $module->id])
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
