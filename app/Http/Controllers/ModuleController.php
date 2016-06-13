<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CourseRequest;
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
		$title = Lang::get('module.create_browser_title');

		return View::make('modules.create', ['title' => $title, 'courseId' => $courseId]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CourseRequest $request)
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

		// Recupero de la relación solamente el modulo solicitado
		$module = $course->modules()->where('id', '=', $moduleId)->first();

		// Si el modulo no existe o se elimino se retorna un error 404 Not found
		if($module === null)
		{
			abort(404);
		}
		else
		{
			$title = $course->name .' - '. $module->name;

			return view('modules.show', [
				'module' 		=> $module, 
				'title' 		=> $title, 
				'course' 		=> $course,
			]);		
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
